<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
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

/*------------------------------- ADMINISTRADORES -------------------------------*/
/* Rotas de Página */
Route::get('/profile', [AuthController::class, 'profile_view'])->name('profile');
Route::get('/login', [AuthController::class, 'login_view'])->name('login');

Route::get('/admin', [AuthController::class, 'index'])->name('admin.all');
Route::get('/admin/create', [AuthController::class, 'create'])->name('admin.create');
Route::get('/admin/{id}', [AuthController::class, 'show'])->name('admin.show');
Route::get('/admin/edit/{id}', [AuthController::class, 'edit'])->name('admin.edit');

/* Rotas de Registro */
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.method');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/change_password', [AuthController::class, 'change_password'])->name('change_password');

Route::put('/admin/{id}', [AuthController::class, 'update']);
Route::delete('/admin/{id}', [AuthController::class, 'destroy']);

/*------------------------------- DASHBOARD -------------------------------*/
Route::get('/', function() {
    return view('dashboard', [
        'path' => [
            ['name' => 'Início', 'path' => '/']
        ]
    ]);
})->name('dashboard')->middleware('auth');

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

/*------------------------------- GRUPOS -------------------------------*/
/* Rotas de Página */
Route::get('/groups', [GroupController::class, 'index'])->name('groups.all');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::get('/groups/{id}', [GroupController::class, 'show'])->name('groups.show');
Route::get('/groups/edit/{id}', [GroupController::class, 'edit'])->name('groups.edit');

/* Rotas de Registro */
Route::post('/groups', [GroupController::class, 'store']);
Route::put('/groups/{id}', [GroupController::class, 'update']);
Route::delete('/groups/{id}', [GroupController::class, 'destroy']);

/*------------------------------- CATEGORIAS -------------------------------*/
/* Rotas de Página */
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.all');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');

/* Rotas de Registro */
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

/*------------------------------- TOMBAMENTOS -------------------------------*/
Route::post('/tombs', [TombController::class, 'store']);
Route::put('/tombs/{id}', [TombController::class, 'update']);
Route::delete('/tombs/{id}', [TombController::class, 'destroy']);
