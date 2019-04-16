@extends('layout')
@section('titulo',$titulo)

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
	  	<div class="card-header"><h3>Realizar inspeccion del auto, ingrese los datos.</h3></div>
		  	<div class="card-body">
			    <form name="formulario1" class="form-group" method="POST" action="{{ url('storeInspection') }}">

					{{ csrf_field() }}
					<div class="form-group">
						<label for="placa">Placa</label>
						<input class="form-control form-control-sm" type="text" name="placa" placeholder="placa" min="8" max="10" value="{{ old('placa')}}">			
					</div>
					<div class="form-group">								
						<label for="cedula">Cedula del Propietario</label>
						<input class="form-control form-control-sm" type="string" name="cedula" max="10" placeholder="Cedula" value="{{old('cedula')}}">
					</div>
					<div class="form-group">
						<label for="marca">Marca*</label>
						<input class="form-control form-control-sm" type="text" name="marca" placeholder="Marca" value="{{old('marca')}}">				        		
					</div>
					<div class="form-group">
						<label for="modelo">Modelo</label>
						<input class="form-control form-control-sm" type="text" name="modelo" placeholder="Modelo" value="{{old('modelo')}}">					
					</div>
					<div class="form-group">
						<label for="anio">Año</label>
						<input class="form-control form-control-sm" type="number" name="anio" placeholder="Año de fabricacion" min="1910" max="2100" value="{{old('anio')}}">								
					</div>
					<div class="form-group">													
						<label for="estado_carro">Estado del Auto</label>
						<input class="form-control form-control-sm" type="text" name="estado_carro" placeholder="descripcion del estado del auto" value="{{old('estado_carro')}}">
					</div>
					<input class="btn btn-primary" type="submit" name="enviar" value="Realizar Inspeccion">	
			        <a href="{{ route('listaDeInspecciones') }}" class="btn">Volver</a>
				</form>
		  	</div>
	</div>	
@endsection