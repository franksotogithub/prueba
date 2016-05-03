<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('controlador','PruebaController@index' );
Route::get('name/{nombre}','PruebaController@nombre' );
Route::resource('movie','MovieController');
//Route::resource('movie','MovieController');

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','FrontController@index');
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');

Route::get('prueba', function () {
    return "Hola desde routes.php";
});

Route::get('nombre/{nombre}', function ($nombre) {
    return "Mi nombre es: ".$nombre;
});

Route::get('edad/{edad?}', function ($edad=10) {
    return "Mi edad es: ".$edad;
});
