<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookController extends Controller
{
    public $model = Book::class;
    public $page = "books";
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
}
