@extends('layout')

@section('titulo')
	{{$titulo}}
@endsection
@section('contenido')
	@if($usuarios->isNotEmpty())			
		<h3 class="text-center my-4">{{$titulo}}</h3>					
			@php
				$i = 0	
			@endphp			 
			@foreach($usuarios as $usuario)				
				@if ($i%2 == 0 )
					<div class="row my-4">
				@endif					
					<div class="col">
					    <div class="card">
						    <div class="card-body">
							    <h5 class="card-title">{{ $usuario->id }}</h5>
							    <p class="card-text"><strong>Login:</strong> {{$usuario['login']}}</p>
							    <p class="card-text"><strong>Nombre:</strong> {{$usuario['nombre']}}</p>				    
						    </div>
					    </div>
				  	</div> 			
				@php
					if ($i%2 != 0 ){
						echo "</div>";
					}
					$i++;
				@endphp
			@endforeach					
	@else
		<h1>No hay usuarios registrados</h1>		
	@endif
@endsection