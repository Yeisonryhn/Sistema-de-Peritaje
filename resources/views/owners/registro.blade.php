@extends('layout')

@section('titulo')
	{{$titulo}}
@endsection

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
	  	<div class="card-header"><h3>Registro de Propietario</h3></div>
		  	<div class="card-body">
			    <form name="formulario1" class="form-group" method="POST" action="{{url('propietarios')}}">

					{{ csrf_field() }}
					<div class="form-group">
						<label for="cedula">Cedula:</label>
						<input type="text"  name="cedula" class="form-control form-control-sm">				
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" name="nombre" class="form-control form-control-sm">				
					</div>
					<div class="form-group">
				        <label for="direccion" >Direccion:</label>
						<input type="text" name="direccion" class="form-control form-control-sm">			
					</div>
					<div class="form-group">
						<label for="telefono">Telefono:</label>
						<input type="text" name="telefono" class="form-control form-control-sm">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" class="form-control form-control-sm">						
					</div>
			        <input type="submit" name="enviar" value="Registrar" class="btn btn-primary mx-auto">		
					<a href="{{ route('listaDePropietarios') }}" class="btn">Volver</a>
				</form>
		  	</div>
	</div>	
@endsection