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


Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get("/jesus", function(){
	echo "estoy motrando mi nombre";
});

Route::get("/jesus/vega", function(){
	echo "estoy motrando mi nombre y mi apellido";
});

Route::post("/makeLogin", function(){
	return view('users');
});

Route::get("/users", function(){
	return view('users');
});

Route::post("/users/createUser","UserController@create");