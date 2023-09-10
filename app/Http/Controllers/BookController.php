<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Models\Book;
use App\Http\Resources\BookResource;
// use Illuminate\Database\Eloquent\Collection;
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
        'image'
    ];
    public $resource = BookResource::class;
    public $root_path = ['name' => 'Livros', 'path' => '/books'];

    public function relationships() {
        return [
            'categories' => Category::all(),
            'groups' => Group::all(),
        ];
    }
}
