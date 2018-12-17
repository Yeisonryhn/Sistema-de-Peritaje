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

Route::get('/', 'InicioController@index');
Route::get('/menu', 'InicioController@menu');
//RUTAS DE USUARIOS
Route::get('/usuarios', 'UsuarioController@index')->name('listaDeUsuarios');
Route::post('/usuarios','UsuarioController@store');
Route::get('/usuarios/nuevo', 'UsuarioController@create')->name('crearUsuario');
//FIN RUTAS DE USUARIOS
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
