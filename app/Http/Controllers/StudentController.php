<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\GenericResource;

class StudentController extends Controller
{
    public $model = Student::class;
    public $page = 'students';
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
    public $root_path = ['name' => 'Alunos', 'path' => '/students'];
}
