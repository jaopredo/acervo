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
    public $page;
    public $inputs;
    public $resource;
    public $root_path;

    /*-------------------------- API METHODS --------------------------*/
    public function getAll(Request $request) {
        $limit = 10;
        if ($request->limit) $limit = $request->limit;

        if ($request->filters) {
            $filter = new Filter($request, $this->model);
            return $filter->sort()->filter();
        }

        return $this->resource::collection($this->model::paginate($limit))->response()->getData();
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
        $int = $this->getAll($request);

        return view(
            $this->page . '/index',
            [
                'data'=> $int->data,
                'meta' => $int->meta,
                'path' => [ $this->root_path ]
            ]
        );
    }

    public function create() {
        $relationships = $this->relationships();

        return view(
            'books/create', [
                'relationships' => $relationships,
                'path' => [
                    $this->root_path,
                    [ 'name' => 'Criar Livro', 'path' => 'create' ]
                ]
            ]);
    }

    public function show($id) {
        $book = $this->get($id);

        return view(
            'books/show', [
                'book'=>$book,
                'path' => [
                    $this->root_path,
                    [ 'path' => $book->id, 'name' => $book->name ]
                ]
            ]);
    }

    public function edit($id) {
        $book = $this->model::findOrFail($id);

        return view('books/edit', [
            'book'=>$book,
            'path' => [
                $this->root_path,
                [ 'name' => 'Editar', 'path' => '#' ],
                [ 'name' => $book->name, 'path' => $book->id ]
            ]
        ]);
    }
}
