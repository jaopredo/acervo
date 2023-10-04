<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    public function index($name) {
        return response()->file(storage_path('app/' . env('FILE_STORAGE') . $name));
    }
}
