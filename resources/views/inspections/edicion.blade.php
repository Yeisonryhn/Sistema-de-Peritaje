@extends('layout')

@section('titulo', $titulo)	


@section('contenido')
	@if($errors->any())
		<div class="alert alert-danger m-4" role="alert">
			<h3>Por favor corrija los siguientes errores</h3>
			@foreach ($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif	 	
	<div class="card m-4">
	  	<div class="card-header"><h3>Editar el Inspeccion {{ $inspeccion->id }}</h3></div>
		  	<div class="card-body">
			    <form name="formulario1" class="form-group" method="POST" action="{{ url("inspecciones/{$inspeccion->id}") }}">

					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label for="placa">Placa:</label>   
						<input type="text" maxlength="10" name="placa" placeholder="Placa" value="{{ $inspeccion->placa }}" class="form-control">					
					</div>
					<div class="form-group">
						<label for="cedula">Cedula:</label>   
						<input type="text" maxlength="40" name="cedula" placeholder="cedula" value="{{ $inspeccion->cedula}}" class="form-control">						
					</div>
					<div class="form-group">
				        <label for="marca">Marca:</label>   
						<input type="textarea" name="marca" maxlength="200" placeholder="marca" value="{{ $inspeccion->marca}}" class="form-control">						
					</div>
					<div class="form-group">
				        <label for="modelo">Modelo:</label>   
						<input type="text" name="modelo" maxlength="11" placeholder="modelo" value="{{ $inspeccion->modelo}}" class="form-control">						
					</div>
					<div class="form-group">
				        <label for="anio">Año:</label>   
						<input type="text" name="anio"  placeholder="anio" value="{{ $inspeccion->anio }}" class="form-control">
					</div>
					<div class="form-group">
				        <label for="estado_carro">Estado del Auto:</label>   
						<input type="text" name="estado_carro"  placeholder="Estado del Carro" value="{{ $inspeccion->estado_carro }}" class="form-control">						
					</div>
			        <input type="submit" name="enviar" value="Actualizar" class="btn btn-primary mx-auto">		
					<a href="{{ route('listaDeInspecciones') }}" class="btn">Volver</a>
				</form>
		  	</div>
	</div>
@endsection