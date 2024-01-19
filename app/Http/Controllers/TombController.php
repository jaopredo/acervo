<?php

namespace App\Http\Controllers;

use App\Models\Tomb;

use App\Http\Resources\GenericResource;

class TombController extends Controller
{
    public $model = Tomb::class;
    public $page = 'tombs';
    public $inputs = [
        'book_id',
        'tomb'
    ];
    public $validator = [
        'book_id' => 'required|exists:books,id',
        'tomb' => 'required|date'
    ];
    public $resource = GenericResource::class;
}
