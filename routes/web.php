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

Route::get('/', function () {
	activity()
   //->performedOn($anEloquentModel)
   //->causedBy('1234567890')
   ->withProperties(['customProperty' => 'customValue'])
   ->log('Look, I logged something');

    return view('welcome');
});
