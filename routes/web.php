<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\TombController;

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

/*------------------------------- LIVROS -------------------------------*/
/* Rotas de Página */
Route::get('/books', [BookController::class, 'index'])->name('books.all');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');

/* Rotas de Registro */
Route::post('/books', [BookController::class, 'store']);
Route::put('/books/{id}', [BookController::class, 'update']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);

/*------------------------------- TOMBAMENTOS -------------------------------*/
Route::post('/tombs', [TombController::class, 'store']);
Route::put('/tombs/{id}', [TombController::class, 'update']);
Route::delete('/tombs/{id}', [TombController::class, 'destroy']);
