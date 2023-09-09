<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
// use App\Http\Resources\PaginationResource;
// use App\Http\Resources\BookResource;
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
    public $resource;

    /*-------------------------- API METHODS --------------------------*/
    public function getAll(Request $request) {
        $limit = 10;
        if ($request->limit) $limit = $request->limit;

        if ($request->filters) {
            $filter = new Filter($request, $this->model);
            return $this->resource::collection($filter->sort()->filter());
        }

        return $this->resource::collection($this->model::paginate($limit));
    }

    public function get($id) {
        $instance = $this->model::findOrFail($id);
        return new $this->resource($instance);
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
        $books = $this->getAll($request);

        return view('books/index', ['books'=>$books, 'search' => false]);
    }

    public function create() {
        $relationships = $this->relationships();

        return view('books/create', ['relationships' => $relationships]);
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
