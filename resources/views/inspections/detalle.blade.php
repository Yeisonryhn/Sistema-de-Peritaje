@extends('layout')
@section('titulo', "Inspeccion $inspeccion->id")

@section('contenido')
	<div class="card m-4">
		<div class="card-header">
			Detalle del inspeccion {{ $inspeccion->id }}		
		</div>
		<div class="card-body">
			<p>Placa: {{ $inspeccion->placa }}</p>
			<p>Cedula: {{ $inspeccion->propietario_cedula }}</p>
			<p>Marca: {{ $inspeccion->marca }}</p>
			<p>Modelo: {{ $inspeccion->modelo }}</p>
			<p>Año: {{ $inspeccion->anio }}</p>
			<p>Estado del Carro: {{ $inspeccion->estado_carro }}</p>
			<a href="{{   route('listaDeInspecciones') }}" class="btn">Volver</a>
			<a href="{{ route( 'editarInspeccion', $inspeccion ) }} " class="btn btn-primary">Editar</a>
		</div>
	</div>
	
@endsection