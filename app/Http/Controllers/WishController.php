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
        'book_id',
    ];
    public $validator = [
        'book_id'=> 'required|exists:books,id',
    ];

    public $page = 'wishes';
    public $root_path = ['name' => 'Desejos', 'path' => '/wishes'];

    public $filters = [];

    public function getStudentWishes() {
        $wishes = $this->model::where('student_id', '=', auth()->user()->id)->get();

        return $wishes;
    }

    public function createWish(Request $request) {
        $user = auth()->user();

        $wish = new $this->model;
        $wish->student_id = $user->id;
        $wish->book_id = $request->book_id;
        $wish->save();

        return $wish;
    }
}
