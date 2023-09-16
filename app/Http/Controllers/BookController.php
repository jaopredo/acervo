<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Http\Resources\BookResource;
// use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;
use App\Models\Group;
use App\Models\BookCategory;

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
    public $foreing_keys = [ 'categories' ];
    public $resource = BookResource::class;
    public $root_path = ['name' => 'Livros', 'path' => '/books'];

    public function relationships() {
        return [
            'save' => function ($book_id, Request $request, $operation) {
                $categories = $request->only('categories');

                if (count($categories) > 0) {
                    if ($operation == 'save') {
                        foreach($categories['categories'] as $category_id) {
                            $book_category = new BookCategory;

                            $book_category->book_id = $book_id;
                            $book_category->category_id = $category_id;

                            $book_category->save();
                        }
                    } else if ($operation == 'update') {
                        BookCategory::where('book_id', $book_id)->delete();

                        foreach($categories['categories'] as $category_id) {
                            $book_category = new BookCategory;

                            $book_category->book_id = $book_id;
                            $book_category->category_id = $category_id;

                            $book_category->save();
                        }
                    }
                } else {
                    if ($operation == 'update') {
                        BookCategory::where('book_id', $book_id)->delete();
                    }
                }
            },
            'fields' => [
                'categories' => Category::all(),
                'groups' => Group::all(),
            ]
        ];
    }
}
