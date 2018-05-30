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

Route::group (['middleware'=> 'auth'], function(){

Route::get ('/Mantenimiento', 'MantenController@index')->name('Mantenimiento');

Route::get ('/Mantenimiento/create', 'MantenController@create')->name('Mantenimiento.create');
Route::post ('/Mantenimiento', 'MantenController@store')->name('Mantenimiento.store');
Route::get ('/Mantenimiento/{manten}','MantenController@edit')->name('Mantenimiento.edit');
Route::put ('/Mantenimiento/{manten}','MantenController@update')->name('Mantenimiento.update');
Route::delete ('/Mantenimiento/{manten}','MantenController@destroy')->name('Mantenimiento.destroy');


Route::get ('/Equipo', 'tipoequipoController@index')->name('Equipo');

Route::get ('/Equipo/create', 'tipoequipoController@create')->name('tipoequipo.create');

Route::get ('/Equipo/{equip}','tipoequipoController@edit')->name('Equipo1.edit');
Route::post ('/Equipo', 'tipoequipoController@store')->name('tipoequipo.store');

Route::put ('/Equipo/{equip}','tipoequipoController@update')->name('tipoequipo.update');

Route::delete ('/Equipo/{equip}','tipoequipoController@destroy')->name('tipoequipo.destroy');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
