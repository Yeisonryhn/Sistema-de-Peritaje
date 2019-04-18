<?php
Route::get('','InicioController@index');
Route::get('/menu', 'InicioController@menu')->name('principal');
//RUTAS DE USUARIOS
Route::get('/usuarios', 'UsuarioController@index')->name('listaDeUsuarios');
Route::post('/usuarios','UsuarioController@store');
Route::get('/usuarios/{usuario}', 'UsuarioController@show')->name('detalleUsuario')->where('usuario','[0-9]+');
Route::get('/usuarios/nuevo', 'UsuarioController@create')->name('crearUsuario');
Route::put('/usuarios/{usuario}', 'UsuarioController@update');
Route::get('/usuarios/{usuario}/editar','UsuarioController@edit')->name('editarUsuario');
Route::delete('/usuarios/{usuario}', 'UsuarioController@destroy')->name('eliminarUsuario');
//RUTAS DE PROPIETARIOS
Route::get('/propietarios', 'PropietarioController@index')->name('listaDePropietarios');
Route::get('/propietarios/nuevo', 'PropietarioController@create')->name('crearPropietario');
Route::post('/propietarios', 'PropietarioController@store');
Route::get('propietarios/{propietario}', 'PropietarioController@show')->name('detallePropietario')->where('propietario' , '[0-9]+');
Route::get('propietarios/{propietario}/editar', 'PropietarioController@edit')->name('editarPropietario');
Route::put('/propietarios/{propietario}', 'PropietarioController@update');
Route::delete('/propietarios/{propietario}', 'PropietarioController@destroy')->name('eliminarPropietario');
//RUTAS DE INSPECCIONES
Route::get('inspecciones', 'InspeccionController@index')->name('listaDeInspecciones');
Route::get('inspecciones/nuevo','InspeccionController@create')->name('realizarInspeccion');
Route::post('storeInspection', 'InspeccionController@store')->name('storeInspection');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
