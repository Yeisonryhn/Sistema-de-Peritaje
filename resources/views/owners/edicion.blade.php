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
	  	<div class="card-header"><h3>Editar el Propietario {{ $propietario->id }}</h3></div>
		  	<div class="card-body">
			    <form name="formulario1" class="form-group" method="POST" action="{{ url("propietarios/{$propietario->id}") }}">

					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label for="cedula">Cedula:</label>   
						<input type="text" maxlength="10" name="cedula" placeholder="Cedula" value="{{ $propietario->cedula }}" class="form-control">					
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>   
						<input type="text" maxlength="40" name="nombre" placeholder="Nombre" value="{{ $propietario->nombre}}" class="form-control">						
					</div>
					<div class="form-group">
				        <label for="direccion">Direccion:</label>   
						<input type="textarea" name="direccion" maxlength="200" placeholder="Direccion" value="{{ $propietario->direccion}}" class="form-control">						
					</div>
					<div class="form-group">
				        <label for="telefono">Telefono:</label>   
						<input type="text" name="telefono" maxlength="11" placeholder="Telefono" value="{{ $propietario->telefono}}" class="form-control">						
					</div>
					<div class="form-group">
				        <label for="email">Email:</label>   
						<input type="email" name="email"  placeholder="Email" value="{{ $propietario->email }}" class="form-control">						
					</div>
			        <input type="submit" name="enviar" value="Actualizar" class="btn btn-primary mx-auto">		
					<a href="{{ route('listaDePropietarios') }}" class="btn">Volver</a>
				</form>
		  	</div>
	</div>
@endsection