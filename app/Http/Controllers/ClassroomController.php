<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Classroom;

use App\Http\Resources\GenericResource;

class ClassroomController extends Controller
{
    public $model = Classroom::class;
    public $page = 'classrooms';
    public $inputs = [
        'name',
    ];
    public $validator = [
        'name' => 'required'
    ];
    public $filters = [
        [ 'name' => 'name', 'label' => 'Nome', 'operator' => 'like' ],
    ];
    public $resource = GenericResource::class;
    public $root_path = ['name' => 'Salas de Aula', 'path' => '/classrooms'];
}
