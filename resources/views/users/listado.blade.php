@extends('layout')

@section('titulo')
	{{$titulo}}
@endsection
@section('contenido')
	@if($usuarios->isNotEmpty())
		<div class="d-flex justify-content-between m-3">
			<h2 class="m-1">{{$titulo}}</h2>	
			<a class="btn btn-primary m-1" href="{{ route('crearUsuario') }}" title="">Nuevo Usuario</a>
		</div>			
			<table class="table table-striped">
		  	<thead>
			    <tr><th scope="col">ID</th><th scope="col">Login</th><th scope="col">Nombre</th><th scope="col">Opciones</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  	@foreach ($usuarios as $usuario)
		  		<tr>
			      	<th scope="row">{{$usuario->id}}</th>
			      	<td>{{ $usuario->login}}</td>
			      	<td>{{ $usuario->nombre}}</td>
			      	<td>
			      		<a href="{{ route('detalleUsuario', $usuario) }}">Detalle</a>
			      		<a href=""></a>
			      		<a href=""></a>
			      	</td>
		    	</tr>		
		  	@endforeach	
		        
		  	</tbody>
		</table>						
	@else
		<h2>No hay usuarios registrados</h2>		
	@endif
@endsection