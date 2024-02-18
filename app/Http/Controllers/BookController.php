<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Http\Resources\BookResource;
use App\Models\Category;
use App\Models\Group;

class BookController extends Controller
{
    public $model = Book::class;
    public $page = 'books';
    public $inputs = [
        'register',
        'cdd',
        'isbn',
        'name',
        'author',
        'publication',
        'editor',
        'pages',
        'volume',
        'example',
        'aquisition_year',
        'aquisition',
        'local',
        'description',
        'image',
        'type'
    ];

    public $filters = [
        [ 'name' => 'name', 'label' => 'Nome', 'operator' => 'like' ],
        [ 'name' => 'register', 'label' => 'Registro', 'operator' => 'like' ],
        [ 'name' => 'isbn', 'label' => 'ISBN', 'operator' => 'like' ],
    ];

    public $validator = [
        'register' => 'required',
        'cdd' => 'required',
        'name' => 'required',
        'author' => 'required',
        'editor' => 'required',
        'type' => 'required',
        'image' => 'file'
    ];

    public $resource = BookResource::class;
    public $root_path = ['name' => 'Livros', 'path' => '/books'];
}
