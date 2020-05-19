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
	  	<div class="card-header"><h3>Ingrese sus datos para registrarse en Peritex</h3></div>
		  	<div class="card-body">
			    <form name="formulario1" class="form-group" method="POST" action="{{url('usuarios')}}">

					{{ csrf_field() }}
					<div class="form-group">
						<label for="login">Login:</label>   
						<input type="text" name="login" placeholder="Usuario" class="form-control">					
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>   
						<input type="text" name="nombre" placeholder="Nombre" class="form-control">						
					</div>
					<div class="form-group">
				        <label for="clave">Contraseña:</label>   
						<input type="password" name="clave" placeholder="Contraseña" class="form-control">						
					</div>
			        <input type="submit" name="enviar" value="Registrar" class="btn btn-primary mx-auto">		
					<a href="{{ route('listaDeUsuarios') }}" class="btn">Volver</a>
				</form>
		  	</div>
	</div>
	
@endsection