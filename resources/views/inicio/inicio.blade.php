@extends('layout')

@section('titulo')
{{$titulo}}
@endsection
@section('contenido')    
    <h1 class="text-center my-1">Bienvenido a Peritex</h1>
    <img src="img/carrusel1.jpg"  class="img-fluid mx-auto d-block" alt="Responsive image">
    {{-- <form  name="formulario" action="{{ url('menu') }}" method="GET">	
        <div class="form-group">
        	<label for="login">Usuario:</label>
        	<input type="text" name="login" placeholder="Usuario" id="login"><br>
        </div>
        <div class="form-group">
        	<label for="password">Contraseña:</label>
        	<input type="password" name="password" placeholder="Contraseña" id="password"><br>
        </div>
        
        <input type="submit" value="Ingresar">
    </form> --}}
   <form name="formulario" action="{{ url('menu') }}" method="GET" class="mx-auto" style="width: 300px;">
	  	<div class="form-group" >
		    <label for="usuario">Usuario:</label>
		    <input type="text" class="{{}}" id="usuario" aria-describedby="emailHelp" placeholder="Usuario">
	  	</div>
	  	<div class="form-group">
		    <label for="contrasena">Contraseña</label>
		    <input type="password" class="form-control" id="contrasena" placeholder="Contraseña">
	  	</div>  
	  	<button type="submit" class="btn btn-primary mx-auto d-block" >Ingresar</button>
	</form>    	
@endsection

