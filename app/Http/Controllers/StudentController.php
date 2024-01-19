<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Resources\GenericResource;

use App\Traits\AuthMethods;

use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    public $model = Student::class;
    public $page = 'students';
    public $inputs = [
        'name',
        'email',
        'password',
        'registration',
        'classroom_id',
        'cpf',
        'image'
    ];
    public $validator = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password',
        'cpf' => 'required',
        'registration' => 'required',
        'image' => 'nullable',

        'classroom_id' => 'required|exists:classrooms,id'
    ];
    public $filters = [
        [ 'name' => 'name', 'label' => 'Nome', 'operator' => 'like' ],
        [ 'name' => 'email', 'label' => 'Email', 'operator' => 'like' ],
        [ 'name' => 'registration', 'label' => 'Matrícula', 'operator' => 'like' ],
        [ 'name' => 'cpf', 'label' => 'CPF', 'operator' => 'like' ],
    ];
    public $resource = StudentResource::class;
    public $root_path = ['name' => 'Alunos', 'path' => '/students'];  
}
