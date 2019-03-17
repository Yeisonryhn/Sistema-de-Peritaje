@extends('layout')

@section('titulo')
	{{$titulo}}
@endsection
@section('clase', 'list')
@section('contenido')
	@if( $owners->isNotEmpty())
		<h1>Listado de Propietarios</h1>
			<div class="listado">
				
			@foreach( $owners as $owner)
				<div  class="chart">
					<ul>
						<li><strong>Propietario: </strong>{{$owner['nombre']}} </li>
						<li><strong>Cedula: </strong>{{$owner['cedula']}}</li>
						<li><strong>Direccion: </strong>{{$owner['direccion']}}</li>
						<li><strong>Telefono: </strong>{{$owner['telefono']}}</li>
						<li><strong>Email: </strong>{{$owner['email']}}</li>
					</ul>	
				</div>

			@endforeach
			</div>
		
		
	@else
		No hay Propietarios registrados
	@endif
@endsection