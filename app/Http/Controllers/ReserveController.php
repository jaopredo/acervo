<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Reserve;

use App\Http\Resources\ReserveResource;

class ReserveController extends Controller
{
    public $model = Reserve::class;
    public $resource = ReserveResource::class;
    public $inputs = [
        'student_id',
        'book_id',
    ];
    public $validator = [
        'student_id'=> 'required|exists:students,id',
        'book_id'=> 'required|exists:books,id',
    ];

    public $page = 'reserves';
    public $root_path = ['name' => 'Reservas', 'path' => '/reserves'];

    public $filters = [];
}
