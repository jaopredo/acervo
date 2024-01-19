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
        'book_id',
    ];
    public $validator = [
        'book_id'=> 'required|exists:books,id',
    ];

    public $page = 'favorites';
    public $root_path = ['name' => 'Favoritos', 'path' => '/favorites'];

    public $filters = [];

    public function getStudentFavorites() {
        $favorites = $this->model::where('student_id', '=', auth()->user()->id)->get();

        return $favorites;
    }

    public function createWish(Request $request) {
        $user = auth()->user();

        $favorites = new $this->model;
        $favorites->student_id = $user->id;
        $favorites->book_id = $request->book_id;
        $favorites->save();

        return $favorites;
    }
}
