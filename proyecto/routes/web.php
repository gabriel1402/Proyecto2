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
    return view('welcome');
});

Route::get('/bienes', function(){
    return view('bienes');
});


Route::group(['middlaware' => ['web']], function(){


	Route::resource('/usuario','UsuariosController');
	Route::post('/usuario/create', 'UsuariosController@create');
	Route::resource('/login','LoginController');
	Route::post('/login/auth', 'LoginController@login');
	Route::post('/usuario/update', 'LoginController@update');
	Route::get('/usuario/logout', 'LoginController@logout');
});
