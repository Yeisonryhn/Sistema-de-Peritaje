@extends('layout')
@section('titulo')
	{{$titulo}}
@endsection

@section('contenido')
	
	<h1>Ingrese sus datos para registrarse en Peritex</h1>
	<form name="formulario1" method="POST" action="{{url('usuarios')}}">

		{{ csrf_field() }}

		<label for="login">Login:</label>   
		<input type="text" name="login" placeholder="Usuario">

		<label for="nombre">Nombre:</label>   
		<input type="text" name="nombre" placeholder="Nombre">

		<label for="clave">Contraseña:</label>   
		<input type="password" name="clave" placeholder="Contraseña">

		<input type="submit" name="enviar" value="enviar">		
		
	</form>
@endsection