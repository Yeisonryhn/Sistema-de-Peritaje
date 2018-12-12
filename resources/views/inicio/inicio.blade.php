@extends('layout')

@section('titulo')
{{$titulo}}
@endsection
@section('css')
    <link rel="stylesheet" href="css/stylee.css">    
@endsection

@section('contenido')    
    <h1>Bienvenido</h1>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" id='tamano' src="img/carrusel1.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" id='tamano' src="img/carrusel2.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" id='tamano' src="img/carrusel3.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
    </div>

    <form  name="formulario" action="{{ url('menu') }}" method="GET">
        <label for="login">Usuario:</label>
        <input type="text" name="login" placeholder="Usuario"><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" placeholder="Contraseña"><br>
        <input type="submit" value="Ingresar">
    </form>
@endsection

