<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>INED PROF. HUGO LEONEL SANCÉ CETINO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
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
        .btn {
            background-color: #FFD700;
            color: #000;
            border: 1px solid #FFD700;
            border-radius: 4px;
            transition: background-color 0.3s ease;
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
            width: 100%;
            max-height: 50vh; 
        }
        .carousel-item img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
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
</head>
<body>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.coldelvalle.edu.mx/wp-content/uploads/2021/07/como-aprenden-los-alumnos-de-secundaria.jpg"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://www.magisnet.com/wp-content/uploads/2019/02/19-02-20microsoft-1024x682.jpg"
                    class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://www.magisnet.com/wp-content/uploads/2022/07/maestros.jpg"
                    class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                INED
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/admin') }}">Gestiones</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item me-2">
                                <a class="btn btn-warning" href="{{ url('/home') }}">Menu Principal</a>
                            </li>
                        @else
                            <li class="nav-item me-2">
                                <a class="btn btn-warning" href="{{ route('login') }}">Inicio sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item me-2">
                                    <a class="btn btn-warning" href="{{ route('register') }}">Registro</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <h1>INED PROF. HUGO LEONEL SANCÉ CETINO</h1>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="bg-primary text-white p-2">
                                <h4>Visión</h4>
                                <p>
                                    Aspiramos a convertirnos en una comunidad de aprendizaje práctica e interdisciplinaria.
                                    Promover la formación de un profesional de la educación, conocedor de las disciplinas, las
                                    artes, la expresión del movimiento humano, la investigación y la tecnología. Capaz de crear
                                    y aplicar modelos efectivos en su práctica educativa. Un ente reflexivo y holístico que
                                    entiende, respeta y valora la diversidad. Que participe activamente con su comunidad y esté
                                    comprometido con el aprendizaje de por vida.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row justify-content-end mt-5">
            <div class="col-md-6">
                <div class="bg-info text-white p-2">
                    <h4>Misión</h4>
                    <p>
                        Facilitar la formación de maestros reflexivos, críticos y sensibles en escuela elemental y
                        secundaria. Educadores con los conocimientos, las destrezas y las disposiciones necesarias
                        para atender las necesidades fundamentales de sus educandos de manera que estos puedan
                        responder a las complejidades de la sociedad global y se conviertan en miembros productivos
                        de nuestra sociedad democrática.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="bg-secondary text-white p-2">
                                <h4>Datos del establecimiento: </h4>
                                <p>
                                Dirección: 5ta. y 6ta. avenida, 20 y 21 calle.
                                <br>
                                Municipio: Puerto Barrios.
                                <br>
                                Departamento: Izabal.
                                <br>
                                Teléfono +(502) 45879632.
                                <br> 
                                Horario: 1:00 pm - 6:00 pm.
                                <br>
                                Correo: Inedprof.hugosance@gmail.com.
                                <br>
                                Facebook: Ined Prof. Hugo Leonel Sancé Cetino.
                                <br>
                                Jornada: Verpertina.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

