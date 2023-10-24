<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wish;

use App\Http\Resources\WishResource;

class WishController extends Controller
{
    public $model = Wish::class;
    public $resource = WishResource::class;
    public $inputs = [
        'student_id',
        'book_id',
    ];
    public $validator = [
        'student_id'=> 'required|exists:students,id',
        'book_id'=> 'required|exists:books,id',
    ];

    public $page = 'wishes';
    public $root_path = ['name' => 'Desejos', 'path' => '/wishes'];

    public $filters = [];
}
