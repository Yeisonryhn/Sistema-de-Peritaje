@extends('layout')
@section('titulo')
    {{$titulo}}
@endsection

@section('contenido')
<h1>Bienvenido {{$usuario}} que desea hacer?.</h1>
<ul>
    <li>Seccion de usuarios</li>
    <ul>
       <li> <a href="">Registro</a> </li>
       <li> <a href="">Listado</a> </li>
       <li> <a href="">Edicion y modificacion</a></li>
       <li> <a href="">Buscar</a></li>
    </ul><br>

    <li>Seccion de Propietarios</li>
    <ul>
       <li> <a href="">Registro</a> </li>
       <li> <a href="">Listado</a> </li>
       <li> <a href="">Edicion y modificacion</a></li>
       <li> <a href="">Buscar</a></li>
    </ul><br>
    <li> <a href="">Realizar Inspeccion</a></li>
    
</ul>

@endsection