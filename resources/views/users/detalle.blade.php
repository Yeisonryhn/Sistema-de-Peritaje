@extends('layout')
@section('titulo', "Usuario $usuario->id")

@section('contenido')
	<div class="card m-4">
		<div class="card-header">
			Detalle del usuario {{ $usuario->nombre }}		
		</div>
		<div class="card-body">
			<p>Login: {{ $usuario->login }}</p>
			<p>Nombre: {{ $usuario->nombre }}</p>
			<a href="{{   route('listaDeUsuarios') }}" class="btn">Volver</a>
			<a href="{{ route('editarUsuario', $usuario) }}" class="btn btn-primary">Editar</a>
		</div>
	</div>
	
@endsection