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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sumate', 'AfiliadoController@index')->name('sumate');

Route::get('/afiliados', 'AfiliadoController@principal')->name('afiliados');

Route::post('createAfiliado','AfiliadoController@create');

Route::post('storeAfiliado','AfiliadoController@store');

Route::post('editAfiliado','AfiliadoController@edit');

Route::post('deleteAfiliado', 'AfiliadoController@delete');

Route::name('ciudades')->get('/ciudades', 'CiudadController@index');

Route::post('createCiudad','CiudadController@create');

Route::post('editCiudad','CiudadController@edit');

Route::post('deleteCiudad', 'CiudadController@delete');

Route::name('actividades')->get('/actividades', 'ActividadController@index');

Route::post('createActividad','ActividadController@create');

Route::post('editActividad','ActividadController@edit');

Route::post('deleteActividad', 'ActividadController@delete');

Route::get('/afiliados', function () {
    return view('afiliados');
});

Route::get('/register', function () {
    return view('register');
});
