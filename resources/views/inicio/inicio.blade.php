@extends('layout')

@section('titulo')
{{$titulo}}
@endsection
@section('clase','hero')
@section('contenido')    
    <h1>Bienvenido</h1>
    <img class="d-block w-100" class="hero" src="img/carrusel1.jpg">

    <form  name="formulario" action="{{ url('menu') }}" method="GET">
        <label for="login">Usuario:</label>
        <input type="text" name="login" placeholder="Usuario" id="login"><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" placeholder="Contraseña" id="password"><br>
        <input type="submit" value="Ingresar">
    </form>
@endsection

