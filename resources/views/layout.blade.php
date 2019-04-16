<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peritex - @yield('titulo')</title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @yield('css')-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body> 
    <header>
  <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <a class="navbar-brand" href="#">Peritex</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('listaDeUsuarios') }}">Usuarios<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('listaDePropietarios') }}">Propietarios</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('listaDeInspecciones') }}" tabindex="-1" >Inspecciones</a>
                    </li>
                </ul>              
            </div>
        </nav>
    </header>
    {{-- <header>
        <div class="d-flex justify-content-between">
            <h1 class="logo">Peritex</h1>
            <nav class="d-flex justify-content-end">
                
                    <a href="#" class="link"></a>
                    <a href="#" class="link"></a>
                    <a href="#" class="link"></a>
                
            </nav>
        </div>
    </header> --}}
    <main role="main" class="flex-shrink-0">
        <div class="container">
            @yield('contenido')
        </div>
        </main>

    {{-- <section class="@yield('clase')">
        <div class="wrapper">
            @yield('contenido')
        </div>
    </section> --}}

    <footer class="footer m-auto py-3">
        <div class="container">
            <span class="text-muted">Desarrollado por Yeison Fuentes 2019</span>
        </div>
    </footer>
    {{-- 
    <footer>
        <div class="wrapper">
            <h4>Desarrollado por Yeison Fuentes 2019</h4>
        </div>
    </footer> --}}
    {{-- 
    <div class="container">
        <div class="container-fluid"></div>
        <div class="container">
            @yield('contenido')
        </div>
        <div class="container-fluid"></div>
    </div>
     --}}
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
</body>
</html>