<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReadsResource;

use Illuminate\Http\Request;

use App\Models\Read;

class ReadController extends Controller
{
    public $model = Read::class;
    public $resource = ReadsResource::class;
    public $inputs = [
        'book_id',
    ];
    public $validator = [
        'book_id'=> 'required|exists:books,id',
    ];

    public $page = 'reads';
    public $root_path = ['name' => 'Lidos', 'path' => '/reads'];

    public $filters = [];

    public function getStudentReads() {
        $reads = $this->model::where('student_id', '=', auth()->user()->id)->get();

        return $reads;
    }

    public function createWish(Request $request) {
        $user = auth()->user();

        $reads = new $this->model;
        $reads->student_id = $user->id;
        $reads->book_id = $request->book_id;
        $reads->save();

        return $reads;
    }
}
