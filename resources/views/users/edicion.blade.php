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
	  	<div class="card-header"><h3>Editar Usuario {{ $usuario->id }}</h3></div>
		  	<div class="card-body">
			    <form name="formulario1" class="form-group" method="POST" action="{{ url("usuarios/{$usuario->id}") }}">

					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<div class="form-group">
						<label for="login">Login:</label>   
						<input type="text" name="login" placeholder="Usuario" value="{{ $usuario->login }}" class="form-control">					
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>   
						<input type="text" name="nombre" placeholder="Nombre" value="{{ $usuario->nombre}}" class="form-control">						
					</div>
					<div class="form-group">
				        <label for="clave">Contraseña:</label>   
						<input type="password" name="clave" placeholder="Contraseña" class="form-control">						
					</div>
			        <input type="submit" name="enviar" value="Actualizar" class="btn btn-primary mx-auto">		
					<a href="{{ route('listaDeUsuarios') }}" class="btn">Volver</a>
				</form>
		  	</div>
	</div>
@endsection