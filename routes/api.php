<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;
use App\Http\Controllers\TombController;
use App\Http\Controllers\GroupController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

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

Route::get('/books', [BookController::class, 'getAll'])->middleware('guest');
Route::get('/books/{id}', [BookController::class, 'get'])->middleware('guest');
