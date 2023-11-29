<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FileController;

use App\Http\Controllers\AuthApiController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;


use App\Http\Controllers\ReadController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\WishController;

use App\Http\Controllers\ReserveController;
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

Route::name('api.')->group(function () {
    /* ======= SEM AUTENTICAÇÃO ======= */
    Route::post('/register-user', [AdminController::class, 'store']);
    /* AUTENTIFICAÇÃO */
    Route::controller(AuthApiController::class)->group(function() {
        Route::post('/login', 'login')->name('login');
        Route::post('/register', 'register')->name('register');
        Route::post('/logout', 'logout')->name('logout');
    });

    /* LIVROS */
    Route::controller(BookController::class)->prefix('books')->name('books.')->group(function () {
        Route::get('/', 'getAll')->name('all');
        Route::get('/{id}', 'get')->name('specific');
    });
    /* GRUPOS */
    Route::controller(GroupController::class)->prefix('groups')->name('groups.')->group(function () {
        Route::get('/', 'getAll')->name('all');
        Route::get('/{id}', 'get')->name('specific');
    });
    /* CATEGORIAS */
    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'getAll')->name('all');
        Route::get('/{id}', 'get')->name('specific');
    });
    /* ALUNOS */
    Route::controller(StudentController::class)->prefix('students')->name('students.')->group(function () {
        Route::get('/', 'getAll')->name('all');
        Route::get('/{id}', 'get')->name('specific');
    });
    /* SALAS */
    Route::get('/classrooms', [ClassroomController::class, 'getAll'])->name('classrooms.all');

    /* ======= COM AUTENTICAÇÃO ======= */
    Route::middleware(['auth:api'])->group(function() {
        Route::get('/verify', [AuthApiController::class, 'verify']);

        /*------------------------------- LIDOS -------------------------------*/
        Route::name('reads.')->prefix('reads')->controller(ReadController::class)->group(function() {
            Route::get('/', 'getAll')->name('all');
            Route::post('/', 'store')->name('save');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        /*------------------------------- FAVORITOS -------------------------------*/
        Route::name('favorites.')->prefix('favorites')->controller(FavoriteController::class)->group(function() {
            Route::get('/', 'getAll')->name('all');
            Route::post('/', 'store')->name('save');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        /*------------------------------- FAVORITOS -------------------------------*/
        Route::name('wishes.')->prefix('wishes')->controller(WishController::class)->group(function() {
            Route::get('/', 'getAll')->name('all');
            Route::post('/', 'store')->name('save');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        /*------------------------------- RESERVADOS -------------------------------*/
        Route::name('reserves.')->prefix('reserves')->controller(ReserveController::class)->group(function() {
            Route::get('/', 'getAll')->name('all');
            Route::post('/', 'create_and_notify')->name('save');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
    });
});
