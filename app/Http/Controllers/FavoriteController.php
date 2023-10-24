<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Favorite;

use App\Http\Resources\FavoriteResource;

class FavoriteController extends Controller
{
    public $model = Favorite::class;
    public $resource = FavoriteResource::class;
    public $inputs = [
        'student_id',
        'book_id',
    ];
    public $validator = [
        'student_id'=> 'required|exists:students,id',
        'book_id'=> 'required|exists:books,id',
    ];

    public $page = 'favorites';
    public $root_path = ['name' => 'Favoritos', 'path' => '/favorites'];

    public $filters = [];
}
