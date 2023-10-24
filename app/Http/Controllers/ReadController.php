<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReadsResource;

use App\Models\Read;

class ReadController extends Controller
{
    public $model = Read::class;
    public $resource = ReadsResource::class;
    public $inputs = [
        'student_id',
        'book_id',
    ];
    public $validator = [
        'student_id'=> 'required|exists:students,id',
        'book_id'=> 'required|exists:books,id',
    ];

    public $page = 'reads';
    public $root_path = ['name' => 'Lidos', 'path' => '/reads'];

    public $filters = [];
}
