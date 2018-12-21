@extends('layout')

@section('titulo')
	{{$titulo}}
@endsection

@section('contenido')
	@if( $owners->isNotEmpty())
		<h1>Listado de Propietarios</h1>
		<ul>
			@foreach( $owners as $owner)
			<li><strong>Propietario: </strong>{{$owner['cedula']}}{{$owner['nombre']}} {{$owner['direccion']}} {{$owner['telefono']}} {{$owner['email']}}</li>
			@endforeach
		</ul>
		
	@else
		No hay Propietarios registrados
	@endif
@endsection