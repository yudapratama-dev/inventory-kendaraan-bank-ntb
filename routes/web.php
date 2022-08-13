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
    return view('home');
})->middleware(['auth'])->name('home');

Auth::routes();


// Route::get('/', function () {
// 	return view('auth.login');
// });

// Auth::routes();

Route::get('dashboard', function () {
	return view('layouts.master');
});

Route::group(['middleware' => 'auth'], function () {

	Route::resource('divisi', 'Ref\DivisiController');
	Route::get('APIDivisi', 'Ref\DivisiController@APIDivisi')->name('api.divisi');

	Route::resource('driver', 'Master\DriverController');
	Route::get('APIDriver', 'Master\DriverController@APIDriver')->name('api.driver');

	Route::resource('jenis_kendaraan', 'Ref\JenisKendaraanController');
	Route::get('APIJenis', 'Ref\JenisKendaraanController@APIJenis')->name('api.jenis');

	Route::resource('users', 'UserController');
	Route::get('/apiUser', 'UserController@apiUsers')->name('api.users');
	
});
