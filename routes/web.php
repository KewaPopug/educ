<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::name('main.')->group(function() {
    Route::get('/', [HomeController::class, 'welcome']);
		// TODO убери этот лишний комментарий //    Route::view('/', 'welcome');
});

Route::prefix('admin')->name('admin.')->group(function() {

    Route::name('administrators.')->group(function (){
        Route::get('/administrators', [\App\Http\Controllers\Admin\AdministratorsController::class, 'index'])->name('administrators');
    });


    Route::name('teachers.')->group(function (){
        Route::get('/teachers', [\App\Http\Controllers\Admin\TeachersController::class, 'index'])->name('teachers');
    });

    Route::name('students.')->group(function (){
        Route::get('/students', [\App\Http\Controllers\Admin\StudentsController::class, 'index'])->name('students');
        Route::view('/student/form', 'admin/students/form')->name('form');
        Route::get('/students/create', [\App\Http\Controllers\Admin\StudentsController::class, 'create'])->name('create');
        Route::post('/students/create', [\App\Http\Controllers\Admin\StudentsController::class, 'create']);
        Route::view('/students/form', 'admin/students/update');
        Route::get('/students/update{user_id}', [\App\Http\Controllers\Admin\StudentsController::class, 'update'])->name('update');
        Route::view('/students/form', 'admin/students/delete');
        Route::get('/students/delete{user_id}', [\App\Http\Controllers\Admin\StudentsController::class, 'delete'])->name('delete');
    });

    Route::name('auth.')->group(function () {

        Route::view('/main', 'admin/main')->middleware('auth')->name('main');

        Route::view('/login', 'admin/auth/login')->name('login');

        Route::post('/login', [AuthController::class, 'login']);

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    });
});

Route::name('site.')->group(function() {
    Route::name('auth.')->group(function () {

        Route::view('/main', 'main')->middleware('auth')->name('main');

        Route::view('/login', 'login')->name('login');

        Route::post('/login', [LoginController::class, 'login']);

        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    });
});
