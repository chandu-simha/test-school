<?php

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

//putEnv("TML_URL=".env('APP_URL').'/'.env('TMP_NAME'));

Auth::routes(['register' => false]);


Route::get('/home', function () {
	return view('main');
});

Route::middleware(['auth'])->group(function () {
	Route::middleware(['super_admin'])->group(function () {
		Route::get('/', function () {
	return view('main');
});

		Route::get('register', 'Auth\RegisterController@showRegistrationForm');

		Route::post('register', [ 'as' => 'register', 'uses' => 'Auth\RegisterController@register']);
	});
	
	Route::middleware(['school_admin'])->group(function () {    
	});

	Route::middleware(['teacher'])->group(function () {
	});

	Route::middleware(['student'])->group(function () {
	});

	Route::middleware(['parent'])->group(function () {
	});
});


