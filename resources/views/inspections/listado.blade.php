@extends('layout')

@section('titulo', $titulo )

@section('contenido')
	<div class="d-flex justify-content-between m-3">
		<h2>Listado de Inspecciones</h2>
		<a class="btn btn-primary m-1" href="{{ route('realizarInspeccion') }}">Realizar Inspeccion</a>
	</div> 
	<table class="table table-striped">
  	<thead>
	    <tr>
	      	<th scope="col">ID</th>
	      	<th scope="col">Placa</th>
	      	<th scope="col">Marca</th>
	      	<th scope="col">Modelo</th>
	      	<th scope="col">Año</th>
	      	<th scope="col">Estado del Carro</th>
	      	<th scope="col">Cedula del Propietario</th>
	      	<th class=" text-justify-end" colspan="" rowspan="" headers="" scope="col">Opciones</th>
	    </tr>
  </thead>
  <tbody>
  	@foreach($inspecciones as $inspection)
	  	<tr>
	      	<th scope="row">{{ $inspection->id }}</th>
	      	<td>{{ $inspection->placa }}</td>
	      	<td>{{ $inspection->marca }}</td>
	      	<td>{{ $inspection->modelo }}</td>
	      	<td>{{ $inspection->anio }}</td>
	      	<td>{{ $inspection->estado_carro }}</td>
	      	<td>{{ $inspection->propietario_cedula }}</td>
	      	<td class="d-flex justify-content-end">
	      		<a href="{{ route('detalleInspeccion',$inspection) }}" class="btn" title="">Detalle</a>
	      		<a href="{{ route('editarInspeccion',$inspection) }}" class="btn" title="">Editar</a>
	      		<form action="{{ route('eliminarInspeccion',$inspection) }}" method="POST" accept-charset="utf-8">
	      			{{ csrf_field() }}
	      			{{ method_field('DELETE')}}
	      			<input type="submit" class="btn btn-danger" value="Eliminar" name="">
	      		</form>
	      	</td>
	    </tr>
    @endforeach
  </tbody>
</table>
@endsection
