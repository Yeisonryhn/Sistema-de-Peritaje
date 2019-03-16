<?php
Route::get('','InicioController@index');
Route::get('/menu', 'InicioController@menu')->name('principal');
//RUTAS DE USUARIOS
Route::get('/usuarios', 'UsuarioController@index')->name('listaDeUsuarios');
Route::post('/usuarios','UsuarioController@store');
Route::get('/usuarios/nuevo', 'UsuarioController@create')->name('crearUsuario');
//RUTAS DE PROPIETARIOS
Route::get('/propietarios', 'PropietarioController@index')->name('listaDePropietarios');
Route::get('/propietarios/nuevo', 'PropietarioController@create')->name('crearPropietario');
Route::post('/propietarios', 'PropietarioController@store');



//RUTAS DE INSPECCIONES
Route::get('inspeccion','InspeccionController@create')->name('realizarInspeccion');
Route::post('storeInspection', 'InspeccionController@store')->name('storeInspection');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
