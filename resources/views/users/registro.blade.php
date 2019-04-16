@extends('layout')
@section('titulo')
	{{$titulo}}
@endsection

@section('contenido')
	
	<h1>Ingrese sus datos para registrarse en Peritex</h1>
	@if($errors->any())
		<h2>Por favor corrija los siguientes errores</h2>
		@foreach ($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
	@endif

	<form name="formulario1" class="form-group" method="POST" action="{{url('usuarios')}}">

		{{ csrf_field() }}

		<label for="login">Login:</label>   
		<input type="text" name="login" placeholder="Usuario">
		<br>
		<label for="nombre">Nombre:</label>   
		<input type="text" name="nombre" placeholder="Nombre">		
        <br>
		<label for="clave">Contraseña:</label>   
		<input type="password" name="clave" placeholder="Contraseña">		
        <br>
		<input type="submit" name="enviar" value="enviar">		
		
	</form>
@endsection