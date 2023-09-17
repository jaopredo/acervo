<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\GenericResource;

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
}
