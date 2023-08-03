<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/books');
});

/* Rotas de Página */
Route::get('/books', [BookController::class, 'index']);

Route::get('/books/create', [BookController::class, 'create']);

Route::get('/books/{id}', [BookController::class, 'show']);

/* Rotas de Registro */
Route::post('/books/create', [BookController::class, 'store']);
