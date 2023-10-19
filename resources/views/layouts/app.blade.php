<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>INED</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-a4v8ud8f+x995zUp1M1Lzbp7CAZlHPxZ1lAxIVoJb4nZ1qTXyPvhkzo5P7f5f5qu7" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        .nav-item {
            margin-right: 10px;
        }
        .links {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .modal-content {
            background-color: gray;
            color: white;
        }
        .modal-header {
            border-bottom: 1px solid white;
        }
        .btn:hover {
            background-color: #FFC600;
        }
        h1 {
            font-size: 24px;
            text-align: center;
            line-height: 1.5;
            margin-top: 50px;
        }
        .carousel-inner {
            max-height: 50vh; 
        }
        .carousel-item img {
            width: 100%;
            object-fit: cover;
            height: 50vh; 
        }

        .carousel-control-prev, .carousel-control-next {
            width: 40px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.5); 
            border: none; 
            border-radius: 50%;
            font-size: 20px; 
            color: #fff; 
            line-height: 40px; 
            text-align: center;
            transition: background-color 0.3s ease; 
            position: absolute;
            top: 50%; 
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 1;
        }
        .carousel-control-prev {
            left: 10px; 
        }
        .carousel-control-next {
            right: 10px;
        }
        .nav-item {
            margin-right: 10px;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#carouselExampleControls').carousel({ interval: 2000 });
        });
    </script>
</head>
<body style="background-color: #e3f2fd;">
<div id="app">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.coldelvalle.edu.mx/wp-content/uploads/2021/07/como-aprenden-los-alumnos-de-secundaria.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://www.magisnet.com/wp-content/uploads/2019/02/19-02-20microsoft-1024x682.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://www.magisnet.com/wp-content/uploads/2022/07/maestros.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #9B9B9B;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    INED
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">    
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{ url('/admin') }}">Gestiones</a>
                    </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="docentesDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Docentes
                            </a>
                            <div class="dropdown-menu" aria-labelledby="docentesDropdown">
                                <a class="dropdown-item" href="{{ url('/formdocente') }}">Registro</a>
                                <a class="dropdown-item" href="{{ url('/listardocente') }}">Reporte</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="estudianteDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Estudiante
                            </a>
                            <div class="dropdown-menu" aria-labelledby="estudianteDropdown">
                                <a class="dropdown-item" href="{{ url('/formalumno') }}">Registro</a>
                                <a class="dropdown-item" href="{{ url('/listaralumno') }}">Reporte</a>
                                <a class="dropdown-item" href="{{ url('/menuinscripcion') }}">Inscripción</a>
                                <a class="dropdown-item" href="{{ url('/menupadre') }}">Padre o encargado</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="docentesDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Graduandos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="docentesDropdown">
                                <a class="dropdown-item" href="{{ url('/formgraduando') }}">Registro</a>
                                <a class="dropdown-item" href="{{ url('/listargraduando') }}">Reporte</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="docentesDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administración
                            </a>
                            <div class="dropdown-menu" aria-labelledby="docentesDropdown">
                                <a class="dropdown-item" href="{{ url('/formadmon') }}">Registro</a>
                                <a class="dropdown-item" href="{{ url('/listaradmon') }}">Reporte</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="docentesDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pensum
                            </a>
                            <div class="dropdown-menu" aria-labelledby="docentesDropdown">
                                <a class="dropdown-item" href="{{ url('/formpensum') }}">Registro</a>
                                <a class="dropdown-item" href="{{ url('/listarpensum') }}">Reporte</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="docentesDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Curso
                            </a>
                            <div class="dropdown-menu" aria-labelledby="docentesDropdown">
                                <a class="dropdown-item" href="{{ url('/formcurso') }}">Registro</a>
                                <a class="dropdown-item" href="{{ url('/listarcurso') }}">Reporte</a>
                            </div>
                        </li>
                        
                        @can('update', Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="docentesDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Asignaciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="docentesDropdown">
                                <a class="dropdown-item" href="{{ url('/menuasignación') }}">Asignación de cursos</a>
                                <a class="dropdown-item" href="{{ url('/listarol') }}">Asignación de roles</a>
                            </div>
                        </li>
                        @endcan
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-warning" href="{{ route('login') }}">{{ __('Inicio Sesión') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-warning" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="userDropdown" class="btn btn-warning dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end bg-danger" aria-labelledby="userDropdown">
                                    <a class="dropdown-item bg-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
