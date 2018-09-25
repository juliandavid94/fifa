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


Route::resource('equipos', 'EquiposController');

Route::resource('jugadores', 'JugadoresController');

Route::resource('tecnicos', 'TecnicosController');

Route::resource('nacionalidades', 'NacionalidadesController');

Route::resource('posiciones', 'PosicionesController');

Route::resource('rolTecnicos', 'Rol_tecnicoController');
Route::resource('consultas', 'ConsultaController');