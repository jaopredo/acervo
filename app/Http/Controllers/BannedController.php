<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banned;

use App\Http\Resources\BannedResource;

class BannedController extends Controller
{
    public $model = Banned::class;
    public $resource = BannedResource::class;
    public $inputs = [
        'student_id',
        'student_name',
        'expire_date'
    ];
    public $validator = [
        'student_id'=> 'exists:students,id|nullable',
        'student_name'=> 'nullable',
        'expire_date'=> 'date',
    ];

    public $page = 'banneds';
    public $root_path = ['name' => 'Alunos Banidos', 'path' => '/banneds'];

    public $filters = [
        [ 'name' => 'student_name', 'label' => 'Nome', 'operator' => 'like' ],
        [ 'name' => 'expire_date', 'label' => 'Data de Expiração', 'operator' => 'lt', 'type' => 'date' ],
    ];
}
