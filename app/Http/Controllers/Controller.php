<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
// use App\Http\Resources\PaginationResource;
// use App\Http\Resources\BookResource;
use App\Filters\Filter;

use Illuminate\Support\Facades\Route;

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
    public $foreing_keys;

    public function relationships() {

    }

    public $meta;  // Funções que são executadas antes de enviar o formulário

    /*-------------------------- API METHODS --------------------------*/
    public function getAll(Request $request) {
        $limit = 10;
        if ($request->limit) $limit = $request->limit;

        if ($request->filters) {
            $filter = new Filter($request, $this->model);
            return $this->resource::collection($filter->sort()->filter())->response()->getData();
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
        $relationships = $this->relationships();

        foreach ($this->inputs as $attr) {
            if ($relationships) {
                if (!in_array($attr, $this->foreing_keys)) {
                    $inst[$attr] = $request[$attr];
                }
            } else {
                $inst[$attr] = $request[$attr];
            }
        }

        /* VOU TENTAR SALVAR UM ARQUIVO, MAS PODE SER QUE O DOCUMENTO NÃO POSSIBILITE */
        if ($this->model::HAS_FILE) {
            $inst->storeFile($request);
        }
        $inst->save();

        if ($relationships) {
            $relationships['save']($inst->id, $request, 'save');
        }

        if (Route::has("$this->page" . ".show")) {  // Se existir a rota que mostra os registros específicos
            return redirect("$this->page/$inst->id")->with('msg', 'Criado com Sucesso!');
        } else {  // Se não, por exemplo os tombamentos
            return back()->with('msg', 'Criado com Sucesso!');
        }
        // return response(['foi']);
    }

    public function destroy($id) {
        $inst = $this->model::findOrFail($id);  // Pego a Instância

        if ($this->model::HAS_FILE) {  // Se o Modelo tiver um Arquivo
            $inst->deleteFile();  // Deleto o Arquivo
        }

        $this->model::destroy($id);  // Deleto o registro da database

        // return response([
        //     'exists' => Route::has($this->page . '.show') ? 'existe' : 'não existe',
        //     'msg' => $this->page . '.show'
        // ]);

        if (Route::has("$this->page" . ".show")) {  // Se existir a rota que mostra os registros específicos
            return redirect("$this->page")->with('msg', 'Deletado com Sucesso!');
        } else {  // Se não, por exemplo os tombamentos
            return back()->with('msg', 'Deletado com Sucesso!');
        }
    }

    public function update(Request $request) {
        $data = $request->all();

        $inst = $this->model::findOrFail($request->id);
        $relationships = $this->relationships();

        // Tirando as Relationships
        foreach ($this->foreing_keys as $rls) {
            if (in_array($rls, $request->keys())) {
                unset($data[$rls]);
            }
        }
        if ($relationships) {
            $relationships['save']($inst->id, $request, 'update');
        }

        if (($this->model::HAS_FILE) && ($request->hasFile($inst->file_field))) {
            $data = $inst->updateFile($request, $data);
        } else if ($this->model::HAS_FILE && !($request->hasFile($inst->file_field))) {
            $data[$inst->file_field] = $inst[$inst->file_field];
        }

        $inst->update($data);

        if (Route::has("$this->page" . ".show")) {  // Se existir a rota que mostra os registros específicos
            return redirect("$this->page/$inst->id")->with('msg', 'Editado com Sucesso!');
        } else {  // Se não, por exemplo os tombamentos
            return back()->with('msg', 'Editado com Sucesso!');
        }
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
            $this->page . '/create', [
                'relationships' => $relationships,
                'path' => [
                    $this->root_path,
                    [ 'name' => 'Criar Livro', 'path' => 'create' ]
                ],
                'inputs' => $this->inputs
            ]);
    }

    public function show($id) {
        $data = $this->get($id);

        return view(
            $this->page . '/show', [
                'data'=>$data,
                'path' => [
                    $this->root_path,
                    [ 'path' => $data->id, 'name' => $data->name ]
                ]
            ]);
    }

    public function edit($id) {
        $data = $this->model::findOrFail($id);

        return view('books/create', [
            'data'=>$data,
            'relationships' => $this->relationships(),
            'path' => [
                $this->root_path,
                [ 'name' => 'Editar', 'path' => '#' ],
                [ 'name' => $data->name, 'path' => $data->id ]
            ]
        ]);
    }
}
