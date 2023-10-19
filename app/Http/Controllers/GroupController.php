<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenericResource;
use Illuminate\Http\Request;

use App\Models\Group;
use App\Models\Book;

class GroupController extends Controller
{
    public $model = Group::class;
    public $page = 'groups';
    public $inputs = [
        'name',
        'image'
    ];
    public $validator = [
        'name' => 'required',
        'image'=> 'file'
    ];
    public $filters = [
        [ 'name' => 'name', 'label' => 'Nome', 'operator' => 'like' ],
    ];
    public $resource = GenericResource::class;
    public $root_path = ['name' => 'Grupos', 'path' => '/groups'];

    public function add_books(Request $request) {
        $data = $request->only('books');

        Group::findOrFail($request->id)->books()->attach($data['books']);

        return back()->with('msg', 'Adicionados com sucesso!');
    }

    public function relationships() {
        return [
            'books' => Book::all()
        ];
    }
}
