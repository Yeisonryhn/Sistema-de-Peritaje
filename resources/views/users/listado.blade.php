@extends('layout')

@section('titulo')
	{{$titulo}}
@endsection
@section('clase', "list")
@section('contenido')
	@if($usuarios->isNotEmpty())
		
			<h1>{{$titulo}}</h1>
			
				
					<div class="listado">
					@foreach($usuarios as $usuario)
						
					<div class="chart">
						<ul>
							<li><p><strong>Login:</strong> {{$usuario['login']}}</p></li>
							<li><p><strong>Nombre:</strong> {{$usuario['nombre']}}</p></li>
						</ul>	
					</div>
					@endforeach
					</div>
				
			
				
		
		
	@else
		<h1>No hay usuarios registrados</h1>
	@endif
@endsection