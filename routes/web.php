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

Route::get('/', 'HomeController@show');

Route::get('/bienes', function(){
    return view('bienes');
})->name('bienes');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

Route::group(['middlaware' => ['web']], function(){


	Route::resource('/usuario','UsuariosController');
	Route::post('/usuario/create', 'UsuariosController@create');

    Route::post('/bienes/create', 'BienesController@create');

	Route::resource('/login','LoginController');
	Route::post('/login/auth', 'LoginController@login');
	Route::post('/usuario/update', 'UsuariosController@update');
	Route::get('/logout', 'LoginController@logout');
	Route::post('/contact/send', 'MessageController@send');
});
