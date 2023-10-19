<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordForgotController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TombController;

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoansController;

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

/*------------------------------- ESQUECEU A SENHA -------------------------------*/
Route::get('/forgot-password', [PasswordForgotController::class, 'forgot_password'])->name('password.forget');
Route::get('/change-password/{token}', [PasswordForgotController::class, 'password_form'])->middleware('guest')->name('password.reset');

Route::post('/forgot-password', [PasswordForgotController::class, 'send_email'])->middleware('guest')->name('password.email');
Route::post('/change-password', [PasswordForgotController::class, 'redefine_password'])->middleware('guest')->name('password.redefine');

/*------------------------------- ADMINISTRADORES -------------------------------*/
/* Rotas de Página */
Route::get('/profile', [AuthController::class, 'profile_view'])->name('profile');
Route::get('/login', [AuthController::class, 'login_view'])->name('login');
Route::post('/update-password', [AuthController::class, 'reset_password'])->middleware('guest')->name('password.update');

Route::get('/admin', [AuthController::class, 'index'])->name('admin.all');
Route::get('/admin/create', [AuthController::class, 'create'])->name('admin.create');
Route::get('/admin/{id}', [AuthController::class, 'show'])->name('admin.show');
Route::get('/admin/edit/{id}', [AuthController::class, 'edit'])->name('admin.edit');

/* Rotas de Registro */
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.method');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/change_password', [AuthController::class, 'change_password'])->name('change_password');

Route::put('/admin/{id}', [AuthController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}', [AuthController::class, 'destroy'])->name('admin.destroy');

/*------------------------------- DASHBOARD -------------------------------*/
Route::get('/', function() {
    return view('dashboard', [
        'path' => [
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
Route::post('/books', [BookController::class, 'store'])->name('books.save');
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

/*------------------------------- GRUPOS -------------------------------*/
/* Rotas de Página */
Route::get('/groups', [GroupController::class, 'index'])->name('groups.all');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::get('/groups/{id}', [GroupController::class, 'show'])->name('groups.show');
Route::get('/groups/edit/{id}', [GroupController::class, 'edit'])->name('groups.edit');

/* Rotas de Registro */
Route::post('/groups', [GroupController::class, 'store'])->name('groups.save');
Route::put('/groups/{id}', [GroupController::class, 'update'])->name('groups.update');
Route::delete('/groups/{id}', [GroupController::class, 'destroy'])->name('groups.destroy');
Route::patch('/groups/{id}', [GroupController::class, 'add_books'])->name('groups.patch-books');

/*------------------------------- CATEGORIAS -------------------------------*/
/* Rotas de Página */
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.all');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');

/* Rotas de Registro */
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.save');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::patch('/categories/{id}', [CategoryController::class, 'add_books'])->name('categories.patch-books');

/*------------------------------- TOMBAMENTOS -------------------------------*/
Route::post('/tombs', [TombController::class, 'store']);
Route::put('/tombs/{id}', [TombController::class, 'update']);
Route::delete('/tombs/{id}', [TombController::class, 'destroy']);

/*------------------------------- SALAS -------------------------------*/
/* Rotas de Página */
Route::get('/classrooms', [ClassroomController::class, 'index'])->name('classrooms.all');
Route::get('/classrooms/create', [ClassroomController::class, 'create'])->name('classrooms.create');
Route::get('/classrooms/{id}', [ClassroomController::class, 'show'])->name('classrooms.show');
Route::get('/classrooms/edit/{id}', [ClassroomController::class, 'edit'])->name('classrooms.edit');

/* Rotas de Registro */
Route::post('/classrooms', [ClassroomController::class, 'store'])->name('classrooms.save');
Route::put('/classrooms/{id}', [ClassroomController::class, 'update'])->name('classrooms.update');
Route::delete('/classrooms/{id}', [ClassroomController::class, 'destroy'])->name('classrooms.destroy');

/*------------------------------- ESTUDANTES -------------------------------*/
/* Rotas de Página */
Route::get('/students', [StudentController::class, 'index'])->name('students.all');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');

/* Rotas de Registro */
Route::post('/students', [StudentController::class, 'store'])->name('students.save');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

/*------------------------------- ESTUDANTES -------------------------------*/
/* Rotas de Página */
Route::get('/loans', [LoansController::class, 'index'])->name('loans.all');
Route::get('/loans/create', [LoansController::class, 'create'])->name('loans.create');
Route::get('/loans/{id}', function () {
    return redirect(route('loans.all'));
})->name('loans.show');
Route::get('/loans/edit/{id}', [LoansController::class, 'edit'])->name('loans.edit');

/* Rotas de Registro */
Route::post('/loans', [LoansController::class, 'store'])->name('loans.save');
Route::put('/loans/{id}', [LoansController::class, 'update'])->name('loans.update');
Route::delete('/loans/{id}', [LoansController::class, 'destroy'])->name('loans.destroy');
