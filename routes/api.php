<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/file/{name}', [FileController::class, 'index'])->name('file');

Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

/* ======= SEM AUTENTICAÇÃO ======= */
/* LIVROS */
Route::get('/books', [BookController::class, 'getAll'])->name('books.api.all');
/* GRUPOS */
Route::get('/groups', [GroupController::class, 'getAll'])->name('groups.api.all');
/* CATEGORIAS */
Route::get('/categories', [CategoryController::class, 'getAll'])->name('categories.api.all');

/* ALUNOS */
Route::get('/classrooms', [ClassroomController::class, 'getAll'])->name('classrooms.api.all');


/* ======= COM AUTENTICAÇÃO ======= */

