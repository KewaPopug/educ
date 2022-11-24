<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
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

	//TODO убрать закомментированные строки. Они здесь больше ни к чему+


	//TODO Route::view('/home', 'home') нигде не используется в системе. Зачем он тогда нужен? Удали его+

	//TODO некорректное название группы маршрутов(name('user.')). Поскольку данная группа отвечает за авторизацию пользователей, то лигичнее назвать её auth+
	Route::name('auth.')->group(function () {

		//FIXME:
		// private - это плохое название для данного маршрута. Так как подразумевается, что данный маршрут будет вести на главную страницу сайта, то его лучше назвать main, либо home
		// Данный маршрут необходимо убрать из данной группы маршрутов т.к. он не относится к авторизации напрямую+
		Route::view('/main', 'main')->middleware('auth')->name('main');

		Route::get('/login', function () {
			//FIXME:
			// Никогда не пиши логику в маршрутах. Маршруты лучше всего использовать для перенаправления в контроллеры за редким исключением
			// Перенеси блок if (Auth::check()) в метод login() контроллера /var/www/educ/app/Http/Controllers/LoginController.php+


			//TODO перенаправление view также перенести в метод login() контроллера /var/www/educ/app/Http/Controllers/LoginController.php
			return view('login');
		})->name('login');

		// TODO классы лучше всего подключать через команду use т.к. \App\Http\Controllers\LoginController является очень длинной строкой и код становится плохо читаемым+
		Route::post('/login', [LoginController::class, 'login']);

		//FIXME:
		// В этом маршруте также присутствует ненужная логика.
		// Создай метод logout() в контроллере \App\Http\Controllers\LoginController и перенеси логику Auth::logout() туда+
        Route::get('/logout', [LoginController::class, 'logout']);
	});
