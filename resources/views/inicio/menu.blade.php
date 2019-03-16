@extends('layout')
@section('titulo')
    {{$titulo}}
@endsection

@section('clase', "content")
@section('contenido')
<h1>Bienvenido {{$usuario}} que desea hacer?.</h1>
<ul>
    <li>Seccion de usuarios</li>
    <ul>
       <li> <a href="{{route('crearUsuario')}}">Registro</a> </li>
       <li> <a href="{{route('listaDeUsuarios')}}">Listado</a> </li>
       <li> <a href="">Edicion y modificacion</a></li>
       <li> <a href="">Buscar</a></li>
    </ul><br>

    <li>Seccion de Propietarios</li>
    <ul>
       <li> <a href="{{ route('crearPropietario') }}">Registro</a> </li>
       <li> <a href="{{route('listaDePropietarios')}}">Listado</a> </li>
       <li> <a href="">Edicion y modificacion</a></li>
       <li> <a href="">Buscar</a></li>
    </ul><br>
    <li> <a href="">Realizar Inspeccion</a></li>
    
</ul>
@endsection