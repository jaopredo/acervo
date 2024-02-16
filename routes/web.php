<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthWebController;
use App\Http\Controllers\PasswordForgotController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TombController;

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\BannedController;

use App\Http\Controllers\ImportsController;
use App\Http\Controllers\DemandController;

use App\Http\Controllers\ReadController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\WishController;

use App\Http\Controllers\ReserveController;
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
Route::controller(PasswordForgotController::class)->name('password.')->middleware(['guest'])->group(function () {
    Route::get('/forgot-password', 'forgot_password')->name('forget');
    Route::get('/change-password/{token}', 'password_form')->name('reset');

    Route::post('/forgot-password', 'send_email')->name('email');
    Route::post('/change-password', 'redefine_password')->name('redefine');
});

/*------------------------------- AUTENTIFICAÇÃO -------------------------------*/
Route::controller(AuthWebController::class)->group(function() {
    /* Rotas de Página */
    Route::get('/profile', 'profile_view')->name('profile');
    Route::get('/login', 'login_view')->name('login');
    Route::post('/update-password', 'reset_password')->name('password.update');

    Route::post('/login', 'login')->name('login.method');
    Route::post('/logout', 'logout')->middleware(['auth'])->name('logout');
});


Route::middleware(['auth'])->group(function() {
    /*------------------------------- DASHBOARD -------------------------------*/
    Route::get('/', function() {
        return view('dashboard', [
            'path' => [
            ]
        ]);
    })->name('dashboard')->middleware('auth');

    /*------------------------------- ADMINISTRADORES -------------------------------*/
    Route::controller(AdminController::class)->group(function() {
        Route::prefix('/admin')->name('admin.')->group(function() {
            Route::get('/', 'index')->name('all');
            Route::get('/create', 'create')->name('create');
            Route::get('/edit/{id}', 'edit')->name('edit');

            Route::post('/', 'store')->name('save');
            Route::put('/{id}', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });

        /* Rotas de Registro */
        Route::post('/register', 'register')->name('register');
        Route::post('/change_password', 'change_password')->name('change_password');
    });

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

    /*------------------------------- BANIDOS -------------------------------*/
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

    /*------------------------------- SERVIÇOS -------------------------------*/
    Route::get('/demand', [DemandController::class, 'demand'])->name('demand');

    Route::get('/import', [ImportsController::class, 'imports'])->name('imports');
    Route::post('/import', [ImportsController::class, 'generate_import'])->name('excel.import');


    /**
     * Essas rotas seriam utilizadas para visualizar as informações sobre o que os alunos fazem,
     * como quais os livros mais favoritos, os livros mais lidos e os livros mais desejados.
     */

    // /*------------------------------- LIDOS -------------------------------*/
    // Route::name('reads.')->prefix('reads')->controller(ReadController::class)->group(function() {
    //     Route::get('/', 'index')->name('all');
    // });
    // /*------------------------------- FAVORITOS -------------------------------*/
    // Route::name('favorites.')->prefix('favorites')->controller(FavoriteController::class)->group(function() {
    //     Route::get('/', 'index')->name('all');
    // });
    // /*------------------------------- DESEJADOS -------------------------------*/
    // Route::name('wishes.')->prefix('wishes')->controller(WishController::class)->group(function() {
    //     Route::get('/', 'index')->name('all');
    // });

    /**
     * Essa rota iria informar quais os livros que os alunos iam reservar */
    /*------------------------------- RESERVAS -------------------------------*/
    // Route::name('reserves.')->prefix('reserves')->controller(ReserveController::class)->group(function() {
    //     Route::get('/', 'index')->name('all');
    //     Route::delete('/{id}', 'destroy')->name('destroy');
    // });
});
