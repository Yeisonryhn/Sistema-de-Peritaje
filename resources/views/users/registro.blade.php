@extends('layout')
@section('titulo')
	{{$titulo}}
@endsection

@section(clase, "registros")
@section('contenido')
	
	<h1>Ingrese sus datos para registrarse en Peritex</h1>
	@if($errors->any())
		<h2>Por favor corrija los siguientes errores</h2>
	@endif

	<form name="formulario1" method="POST" action="{{url('usuarios')}}">

		{{ csrf_field() }}

		<label for="login">Login:</label>   
		<input type="text" name="login" placeholder="Usuario">
		@if($errors->has('login'))
            <p>{{ $errors->first('login') }}</p>
        @endif
        <br>
		<label for="nombre">Nombre:</label>   
		<input type="text" name="nombre" placeholder="Nombre">
		@if($errors->has('nombre'))
            <p>{{ $errors->first('nombre') }}</p>
        @endif
        <br>
		<label for="clave">Contraseña:</label>   
		<input type="password" name="clave" placeholder="Contraseña">
		@if($errors->has('clave'))
            <p>{{ $errors->first('clave') }}</p>
        @endif
        <br>
		<input type="submit" name="enviar" value="enviar">		
		
	</form>
@endsection