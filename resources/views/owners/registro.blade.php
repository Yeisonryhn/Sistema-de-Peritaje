@extends('layout')

@section('titulo')
	{{$titulo}}
@endsection

@section('contenido')
	<h1>Registro de Propietario</h1>
	<form name="formulario1" method="POST" action="{{url('propietarios')}}">

		{{ csrf_field() }}

		<label for="cedula">Cedula:</label>
		<input type="text"  name="cedula"><br>
		
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre"><br>
		
		<label for="direccion" >Direccion:</label>
		<input type="text" name="direccion"><br>
		
		<label for="telefono">Telefono:</label>
		<input type="text" name="telefono"><br>
		
		<label for="email">Email:</label>
		<input type="email" name="email"><br>
		
		
		
		<label></label>
		<input type="submit" name="enviar" value="Registro">
	</form>
	<a href="">Volver</a>
@endsection