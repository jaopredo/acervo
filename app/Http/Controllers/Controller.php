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

    public $filters;
    public $model;
    public $validator;
    public $page;
    public $inputs;
    public $resource;
    public $root_path;

    /*-------------------------- API METHODS --------------------------*/
    public function getAll(Request $request) {
        $limit = 11;
        if ($request->limit) $limit = $request->limit;

        if ($request->filters) {
            $filter = new Filter($request, $this->model);
            return $this->resource::collection($filter->sort()->filter())->response()->getData();
        }

        return $this->resource::collection($this->model::paginate($limit))->response()->getData();
    }

    public function get($id) {
        $instance = $this->model::findOrFail($id);
        return (new $this->resource($instance));
    }

    public function store(Request $request) {
        // Valido com base nas regras definidas no controller filho
        $request->validate($this->validator);

        // Crio uma nova instancia
        $inst = new $this->model;

        // Retiro as chaves estrangeiras
        $data = $request->except($inst->foreign_keys);

        // Para cada atributo dentro dos inputs declarados no CONTROLLER FILHO
        foreach ($this->inputs as $attr) {
            // Se o atributo estiver nas informações passadas
            if (array_key_exists($attr, $data)) {
                $inst[$attr] = $data[$attr];  // Coloco na instância
            }
        }

        /* VOU TENTAR SALVAR UM ARQUIVO, MAS PODE SER QUE O DOCUMENTO NÃO POSSIBILITE */
        if ($this->model::HAS_FILE && $request->hasFile($inst->file_field)) {
            $inst->storeFile($request);
        }

        $inst->save();  // Salvo

        // Salvo as Chaves Estrangeiras
        if ($this->model::HAS_FOREIGN_KEYS) {
            $inst->saveForeign($request);
        }


        if (is_in_api($request)) {  // Se eu estiver na API
            return response(['msg' => 'Registrado com sucesso!']);
        } else {
            if (Route::has("$this->page" . ".show")) {  // Se existir a rota que mostra os registros específicos
                return redirect(route("$this->page.show", $inst->id))->with('msg', 'Criado com Sucesso!');
            } else {  // Se não, por exemplo os tombamentos
                return back()->with('msg', 'Criado com sucesso!');
            }
        }
    }

    public function destroy(Request $request) {
        $inst = $this->model::findOrFail($request->id);  // Pego a Instância

        if ($this->model::HAS_FILE) {  // Se o Modelo tiver um Arquivo
            $inst->deleteFile();  // Deleto o Arquivo
        }

        $this->model::destroy($request->id);  // Deleto o registro da database

        if (is_in_api($request)) {
            return response(['msg' => 'Deletado com sucesso!']);
        } else {
            if (Route::has("$this->page" . ".all")) {  // Se existir a rota que mostra os registros específicos
                return redirect(route("$this->page.all"))->with('msg', 'Deletado com Sucesso!');
            } else {  // Se não, por exemplo os tombamentos
                return back()->with('msg', 'Deletado com Sucesso!');
            }
        }
    }

    public function update(Request $request) {
        $inst = $this->model::findOrFail($request->id);
        $data = $request->except($inst->foreign_keys);


        if (($this->model::HAS_FILE) && ($request->hasFile($inst->file_field))) {
            $data = $inst->updateFile($request, $data);
        } else if ($this->model::HAS_FILE && !($request->hasFile($inst->file_field))) {
            $data[$inst->file_field] = $inst[$inst->file_field];
        }

        // Salvo as Chaves Estrangeiras
        if ($this->model::HAS_FOREIGN_KEYS) {
            $inst->saveForeign($request);
        }

        $inst->update($data);

        if (is_in_api($request)) {
            return response(['msg' => 'Editado com sucesso!']);
        } else {
            if (Route::has("$this->page" . ".show")) {  // Se existir a rota que mostra os registros específicos
                return redirect("$this->page/$inst->id")->with('msg', 'Editado com Sucesso!');
            } else {  // Se não, por exemplo os tombamentos
                return back()->with('msg', 'Editado com Sucesso!');
            }
        }
    }


    /*-------------------------- WEB METHODS --------------------------*/
    public function index(Request $request) {
        $int = $this->getAll($request);

        return view(
            $this->page . '/index',
            [
                'filters' => $this->filters,
                'data'=> $int->data,
                'meta' => $int->meta,
                'path' => [ $this->root_path ]
            ]
        );
    }

    public function create() {
        return view(
            $this->page . '/create', [
                'path' => [
                    $this->root_path,
                    [ 'name' => 'Criar ' . $this->root_path['name'], 'path' => 'create' ]
                ],
                'inputs' => $this->inputs
            ]
        );
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
            ]
        );
    }

    public function edit($id) {
        $data = $this->model::findOrFail($id);

        return view("$this->page/create", [
            'data'=>$data,
            'path' => [
                $this->root_path,
                [ 'name' => 'Editar', 'path' => '#' ],
                [ 'name' => $data->name, 'path' => $data->id ]
            ]
        ]);
    }
}
