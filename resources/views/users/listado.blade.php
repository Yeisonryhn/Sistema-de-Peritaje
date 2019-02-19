@extends('layout')

@section('titulo')
	{{$titulo}}
@endsection

@section('contenido')
	@if($usuarios->isNotEmpty())
		<h1>{{$titulo}}</h1>
		<ul>
			@foreach($usuarios as $usuario)
				<li><strong>Login:</strong> {{$usuario['login']}} <strong>Nombre:</strong> {{$usuario['nombre']}}</li>
			@endforeach
		</ul>
		
	@else
		<h1>No hay usuarios registrados</h1>
	@endif
@endsection