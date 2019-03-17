<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Peritex - @yield('titulo')</title>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    @yield('css')-->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body> 
    <header>
        <div class="wrapper">
            <h1 class="logo">Peritex</h1>
            <nav class="menu">
                <ul>
                    <li><a href="#" class="link">Usuarios</a></li>
                    <li><a href="#" class="link">Propietarios</a></li>
                    <li><a href="#" class="link">Inspecciones</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="@yield('clase')">
        <div class="wrapper">
            @yield('contenido')
        </div>
    </section>
    <footer>
        <div class="wrapper">
            <h4>Desarrollado por Yeison Fuentes 2019</h4>
        </div>
    </footer>
    <!--
    <div class="container">
        <div class="container-fluid"></div>
        <div class="container">
            @yield('contenido')
        </div>
        <div class="container-fluid"></div>
    </div>
    --> 
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
</body>
</html>