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
			    <tr><th scope="col">ID</th><th scope="col">Login</th><th scope="col">Nombre</th><th scope="col" class="d-flex justify-content-end">Opciones</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  	@foreach ($usuarios as $usuario)
		  		<tr>
			      	<th scope="row">{{$usuario->id}}</th>
			      	<td>{{ $usuario->login}}</td>
			      	<td>{{ $usuario->nombre}}</td>
			      	<td class="d-flex justify-content-end" 	>
			      		<form action="{{ route('eliminarUsuario' , $usuario) }}" method='POST'>
			      			{{ csrf_field() }}
			      			{{ method_field('DELETE') }}
				      		<a href="{{ route('detalleUsuario', $usuario) }}" class="btn">Detalle</a>
				      		<a href="{{ route('editarUsuario' , $usuario) }}" class="btn">Editar</a>
				      		<button type="submit" class="btn btn-danger" value="eliminar">Eliminar</button>
			      		</form>
			      	</td>
		    	</tr>		
		  	@endforeach	
		        
		  	</tbody>
		</table>						
	@else
		<h2>No hay usuarios registrados</h2>		
	@endif
@endsection