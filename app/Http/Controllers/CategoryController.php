<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\GenericResource;

use Illuminate\Http\Request;

use App\Models\Book;

class CategoryController extends Controller
{
    public $model = Category::class;
    public $page = 'categories';
    public $inputs = [
        'name',
    ];
    public $validator = [
        'name' => 'required'
    ];
    public $resource = GenericResource::class;
    public $root_path = ['name' => 'Categorias', 'path' => '/categories'];

    public function add_books(Request $request) {
        $data = $request->only('books');

        Category::findOrFail($request->id)->books()->attach($data['books']);

        return back()->with('msg', 'Adicionados com sucesso!');
    }

    public function relationships() {
        return [
            'books' => Book::all()
        ];
    }
}
