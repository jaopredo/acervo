<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\GenericResource;

use App\Models\Classroom;

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
        'cpf'
    ];
    public $validator = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password',
        'cpf' => 'required',
        'registration' => 'required'
    ];
    public $filters = [
        [ 'name' => 'name', 'label' => 'Nome', 'operator' => 'like' ],
    ];
    public $resource = GenericResource::class;
    public $root_path = ['name' => 'Alunos', 'path' => '/students'];

    public function relationships() {
        return [
            'classrooms' => Classroom::all()
        ];
    }
}
