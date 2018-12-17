@extends('layout')

@section('titulo')
	{{$titulo}}
@endsection

@section('contenido')
	<h1>{{$titulo}}</h1>
	@if($usuarios->isNotEmpty())
		no está vacio
		<ul>
			@foreach($usuarios as $usuario)
				<li><strong>Login:</strong> {{$usuario['login']}} <strong>Nombre:</strong> {{$usuario['nombre']}}</li>
			@endforeach
		</ul>
		
	@else
		Estavacio
	@endif
@endsection