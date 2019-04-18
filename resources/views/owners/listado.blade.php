@extends('layout')

@section('titulo')
	{{$titulo}}
@endsection
@section('clase', 'list')
@section('contenido')
	@if( $owners->isNotEmpty())
		<div class="d-flex justify-content-between m-3">
			<h2 >Listado de Propietarios</h2>
			<a class="btn btn-primary m-1" href="{{ route('crearPropietario') }}" title="">Nuevo Propietario</a>			
		</div>
		<table class="table table-striped">
		  	<thead>
			    <tr>
					<th scope="col">ID</th>
					<th scope="col">Propietario</th>
					<th scope="col">Cedula</th>
					<th scope="col">Direccion</th>
					<th scope="col">Telefono</th>
					<th scope="col">Email</th>
					<th scope="col">Opciones</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  	@foreach ($owners as $owner)
		  		<tr>
			      	<th scope="row">{{$owner->id}}</th>
			      	<td>{{ $owner->nombre}}</td>
			      	<td>{{ $owner->cedula}}</td>
			      	<td>{{ $owner->direccion}}</td>
			      	<td>{{ $owner->telefono}}</td>
			      	<td>{{ $owner->email}}</td>
			      	<td class="d-flex">
			      		<a href="{{ route('detallePropietario',$owner) }}" class="btn" title="">Detalle</a>
			      		<a href="{{ route('editarPropietario',$owner) }}" class="btn" title="">Editar</a>
			      		<form action="{{ route('eliminarPropietario',$owner) }}" method="POST" accept-charset="utf-8">
			      			{{ csrf_field() }}
			      			{{ method_field('DELETE')}}
			      			<input type="submit" class="btn btn-danger" value="Eliminar" name="">
			      		</form>
			      	</td>
		    	</tr>		
		  	@endforeach	
		        
		  	</tbody>
		</table>			
	@else
		No hay Propietarios registrados
	@endif
@endsection