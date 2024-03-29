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
});

Route::prefix('admin')->name('admin.')->group(function() {

    Route::name('administrators.')->group(function (){
        Route::get('/administrators', [\App\Http\Controllers\Admin\AdministratorsController::class, 'index'])->name('administrators');
        Route::view('/administrators/form', 'admin/administrators/form')->name('form');
        Route::get('/administrators/create', [\App\Http\Controllers\Admin\AdministratorsController::class, 'create'])->name('create');
        Route::post('/administrators/create', [\App\Http\Controllers\Admin\AdministratorsController::class, 'create'])->name('create');
        Route::view('/administrators/form', 'admin/administrators/update');
        Route::get('/administrators/update/{user_id}', [\App\Http\Controllers\Admin\AdministratorsController::class, 'update'])->name('update');
        Route::post('/administrators/update/{user_id}', [\App\Http\Controllers\Admin\AdministratorsController::class, 'update'])->name('update');
        Route::get('/administrators/delete/{user_id}', [\App\Http\Controllers\Admin\AdministratorsController::class, 'delete'])->name('delete');
    });

    Route::name('teachers.')->group(function (){
        Route::get('/teachers', [\App\Http\Controllers\Admin\TeachersController::class, 'index'])->name('teachers');
        Route::view('/teacher/form', 'admin/teachers/form')->name('form');
        Route::get('/teachers/create', [\App\Http\Controllers\Admin\TeachersController::class, 'create'])->name('create');
        Route::post('/teachers/create', [\App\Http\Controllers\Admin\TeachersController::class, 'create'])->name('create');
        Route::view('/teachers/form', 'admin/teachers/update');
        Route::get('/teachers/update/{user_id}', [\App\Http\Controllers\Admin\TeachersController::class, 'update'])->name('update');
        Route::post('/teachers/update/{user_id}', [\App\Http\Controllers\Admin\TeachersController::class, 'update'])->name('update');
        Route::view('/teachers/form', 'admin/teachers/delete');
        Route::get('/teachers/delete{user_id}', [\App\Http\Controllers\Admin\TeachersController::class, 'delete'])->name('delete');

    });

    Route::name('students.')->group(function (){
        Route::get('/students', [\App\Http\Controllers\Admin\StudentsController::class, 'index'])->name('students');
        Route::view('/student/form', 'admin/students/form')->name('form');
        Route::get('/students/create', [\App\Http\Controllers\Admin\StudentsController::class, 'create'])->name('create');
        Route::post('/students/create', [\App\Http\Controllers\Admin\StudentsController::class, 'create']);
        Route::view('/students/form', 'admin/students/update');
        Route::get('/students/update/{user_id}', [\App\Http\Controllers\Admin\StudentsController::class, 'update'])->name('update');
        Route::post('/students/update/{user_id}', [\App\Http\Controllers\Admin\StudentsController::class, 'update'])->name('update');
        Route::get('/students/delete{user_id}', [\App\Http\Controllers\Admin\StudentsController::class, 'delete'])->name('delete');
    });

    Route::name('faculties.')->group(function (){
        Route::get('/faculties', [\App\Http\Controllers\Admin\FacultyController::class, 'index'])->name('faculties');
        Route::view('/faculties/form', 'admin/faculties/form')->name('form');
        Route::get('/faculties/create', [\App\Http\Controllers\Admin\FacultyController::class, 'create'])->name('create');
        Route::post('/faculties/create', [\App\Http\Controllers\Admin\FacultyController::class, 'create'])->name('create');
        Route::view('/faculties/form', 'admin/faculties/update');
        Route::get('/faculties/update/{user_id}', [\App\Http\Controllers\Admin\FacultyController::class, 'update'])->name('update');
        Route::post('/faculties/update/{user_id}', [\App\Http\Controllers\Admin\FacultyController::class, 'update'])->name('update');
        Route::get('/faculties/delete/{user_id}', [\App\Http\Controllers\Admin\FacultyController::class, 'delete'])->name('delete');
    });

    Route::name('groups_specializations.')->group(function (){
        Route::get('/groups_specializations', [\App\Http\Controllers\Admin\GroupSpecializationController::class, 'index'])->name('groups_specializations');
        Route::post('/groups_specializations', [\App\Http\Controllers\Admin\GroupSpecializationController::class, 'index'])->name('groups_specializations');
        Route::view('/groups_specializations/form', 'admin/groups_specializations/form')->name('form');
        Route::get('/groups_specializations/create', [\App\Http\Controllers\Admin\GroupSpecializationController::class, 'create'])->name('create');
        Route::post('/groups_specializations/create', [\App\Http\Controllers\Admin\GroupSpecializationController::class, 'create'])->name('create');
        Route::view('/groups_specializations/form', 'admin/groups_specializations/update');
        Route::get('/groups_specializations/update/{user_id}', [\App\Http\Controllers\Admin\GroupSpecializationController::class, 'update'])->name('update');
        Route::post('/groups_specializations/update/{user_id}', [\App\Http\Controllers\Admin\GroupSpecializationController::class, 'update'])->name('update');
        Route::get('/groups_specializations/delete/{user_id}', [\App\Http\Controllers\Admin\GroupSpecializationController::class, 'delete'])->name('delete');
    });

    Route::name('specializations.')->group(function (){
        Route::get('/specializations', [\App\Http\Controllers\Admin\SpecializationController::class, 'index'])->name('specializations');
        Route::post('/specializations', [\App\Http\Controllers\Admin\SpecializationController::class, 'index'])->name('specializations');
        Route::view('/specializations/form', 'admin/specializations/form')->name('form');
        Route::get('/specializations/create', [\App\Http\Controllers\Admin\SpecializationController::class, 'create'])->name('create');
        Route::post('/specializations/create', [\App\Http\Controllers\Admin\SpecializationController::class, 'create'])->name('create');
        Route::view('/specializations/form', 'admin/specializations/update');
        Route::get('/specializations/update/{user_id}', [\App\Http\Controllers\Admin\SpecializationController::class, 'update'])->name('update');
        Route::post('/specializations/update/{user_id}', [\App\Http\Controllers\Admin\SpecializationController::class, 'update'])->name('update');
        Route::get('/specializations/delete/{user_id}', [\App\Http\Controllers\Admin\SpecializationController::class, 'delete'])->name('delete');
        Route::get('/specializations/create/add', [\App\Http\Controllers\Admin\SpecializationController::class, 'addGroupSpecialization'])->name('getGroupSpecialization');
        Route::post('/specializations/create/add', [\App\Http\Controllers\Admin\SpecializationController::class, 'addGroupSpecialization'])->name('getGroupSpecialization');
//        Route::post('/specializations/create', [\App\Http\Controllers\Admin\SpecializationController::class, 'addGroupSpecialization'])->name('addGroupSpecialization');
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
