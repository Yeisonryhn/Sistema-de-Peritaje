@extends('layout')
@section('titulo', "Propietario $propietario->id")

@section('contenido')
	<div class="card m-4">
		<div class="card-header">
			Detalle del propietario {{ $propietario->id }}		
		</div>
		<div class="card-body">
			<p>Cedula: {{ $propietario->cedula }}</p>
			<p>Nombre: {{ $propietario->nombre }}</p>
			<p>Direccion: {{ $propietario->direccion }}</p>
			<p>Telefono: {{ $propietario->telefono }}</p>
			<p>Email: {{ $propietario->email }}</p>
			<a href="{{   route('listaDePropietarios') }}" class="btn">Volver</a>
			<a href="{{ route( 'editarPropietario', $propietario ) }} " class="btn btn-primary">Editar</a>
		</div>
	</div>
	
@endsection