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
	      	<th colspan="" rowspan="" headers="" scope="col">Opciones</th>
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
	      	<td></td>
	    </tr>
    @endforeach
  </tbody>
</table>
@endsection
