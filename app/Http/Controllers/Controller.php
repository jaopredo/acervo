<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use App\Http\Resources\PaginationResource;
use App\Filters\Filter;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct() {
        // $this->middleware('auth:api');
    }

    public $model;
    public $validator;
    public $inputs;
    public $page;


    /*-------------------------- API METHODS --------------------------*/
    public function getAll(Request $request) {
        $limit = 10;
        if ($request->limit) $limit = $request->limit;

        if ($request->filters) {
            $filter = new Filter($request, $this->model);
            return PaginationResource::collection($filter->sort()->filter());
        }
        return PaginationResource::collection($this->model::paginate($limit));
    }

    public function get($id) {
        $publication_type = $this->model::findOrFail($id);
        return $publication_type;
    }

    public function store(Request $request) {
        // $request->validate($this->validator['rules'], $this->validator['messages']);

        $inst = new $this->model;

        foreach ($this->inputs as $attr) {
            $inst[$attr] = $request[$attr];
        }

        /* VOU TENTAR SALVAR UM ARQUIVO, MAS PODE SER QUE O DOCUMENTO NÃO POSSIBILITE */
        if ($this->model::HAS_FILE) {
            $inst->storeFile($request);
        }
        $inst->save();

        return redirect("$this->page")->with('msg', 'Criado com Sucesso!');
    }

    public function destroy($id) {
        $inst = $this->model::findOrFail($id);

        if ($this->model::HAS_FILE) {
            $inst->deleteFile();
        }

        $this->model::destroy($id);

        return redirect("$this->page")->with('msg', 'Deletado com Sucesso!');
    }

    public function update(Request $request) {
        $data = $request->all();

        $inst = $this->model::findOrFail($request->id);

        if ($this->model::HAS_FILE && $request->hasFile($inst->file_field)) {
            $data = $inst->updateFile($request, $data);
        } else {
            $data[$inst->file_field] = $inst[$inst->file_field];
        }

        $inst->update($data);

        return redirect("$this->page/edit/$inst->id")->with('msg', 'Editado com Sucesso!');
    }


    /*-------------------------- WEB METHODS --------------------------*/
    public function index(Request $request) {
        // $search = request('search');
        // $items = '';

        // if ($search) {
        //     $books = Book::where([
        //         ['name', 'like', '%'.$search.'%']
        //     ])->get();

        //     return view('books/index', ['books' => $books, 'search' => $search]);
        // }

        // if ($request->ajax()) {
        //     $books = Book::orderBy('id')->paginate(10);
        //     // <div class="delete-selector-container">
        //     //             <input type="checkbox" name="booksDelete[]" name="'. $book->id .'" >
        //     //         </div>
        //     foreach ($books as $book) {
        //         $items = $items.'<div class="card item book-card">
        //             <div class="card-header">
        //                 <h2 class="card-title"><a href="/books/'.$book->id.'">'.$book->name.'</a></h2>
        //             </div>
        //             <div class="card-body">
        //                 <p class="card-text">Registro:'.$book->register.'</p>
        //                 <p class="card-text">Autor: '.$book->author.'</p>
        //                 <p class="card-text">Páginas:'.$book->pages.'</p>
        //             </div>
        //         </div>
        //         ';
        //     }
        //     return $items;
        // }
        $books = $this->getAll($request);

        return view('books/index', ['books'=>$books, 'search' => false]);
    }

    public function create() {
        return view('books/create');
    }

    public function show($id) {
        $book = $this->get($id);

        return view('books/show', ['book'=>$book]);
    }

    public function edit($id) {
        $book = $this->model::findOrFail($id);

        return view('books/edit', ['book'=>$book]);
    }
}
