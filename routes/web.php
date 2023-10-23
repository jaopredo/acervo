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
use App\Http\Controllers\BannedController;

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
Route::name('books.')->prefix('books')->controller(BookController::class)->group(function() {
    Route::get('/', 'index')->name('all');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');

    /* Rotas de Registro */
    Route::post('/', 'store')->name('save');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

/*------------------------------- GRUPOS -------------------------------*/
/* Rotas de Página */
Route::name('groups.')->prefix('groups')->controller(GroupController::class)->group(function() {
    Route::get('/', 'index')->name('all');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');

    /* Rotas de Registro */
    Route::post('/', 'store')->name('save');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');

    Route::patch('/{id}', 'add_books')->name('patch-books');
});

/*------------------------------- CATEGORIAS -------------------------------*/
/* Rotas de Página */
Route::name('categories.')->prefix('categories')->controller(CategoryController::class)->group(function() {
    Route::get('/', 'index')->name('all');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');

    /* Rotas de Registro */
    Route::post('/', 'store')->name('save');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');

    Route::patch('/{id}', 'add_books')->name('patch-books');
});

/*------------------------------- TOMBAMENTOS -------------------------------*/
Route::name('tombs.')->prefix('tombs')->controller(TombController::class)->group(function() {
    Route::post('/', 'store')->name('save');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

/*------------------------------- SALAS -------------------------------*/
Route::name('classrooms.')->prefix('classrooms')->controller(ClassroomController::class)->group(function() {
    Route::get('/', 'index')->name('all');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');

    /* Rotas de Registro */
    Route::post('/', 'store')->name('save');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

/*------------------------------- ESTUDANTES -------------------------------*/
Route::name('students.')->prefix('students')->controller(StudentController::class)->group(function() {
    Route::get('/', 'index')->name('all');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');

    /* Rotas de Registro */
    Route::post('/', 'store')->name('save');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

/*------------------------------- EMPRÉSTIMOS -------------------------------*/
Route::name('loans.')->prefix('loans')->controller(LoansController::class)->group(function() {
    Route::get('/', 'index')->name('all');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', function () {
        return redirect(route('loans.all'));
    })->name('loans.show');
    Route::get('/edit/{id}', 'edit')->name('edit');

    /* Rotas de Registro */
    Route::post('/', 'store')->name('save');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

/*------------------------------- EMPRÉSTIMOS -------------------------------*/
Route::name('banneds.')->prefix('banneds')->controller(BannedController::class)->group(function() {
    Route::get('/', 'index')->name('all');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', function () {
        return redirect(route('banneds.all'));
    })->name('loans.show');
    Route::get('/edit/{id}', 'edit')->name('edit');

    /* Rotas de Registro */
    Route::post('/', 'store')->name('save');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});
