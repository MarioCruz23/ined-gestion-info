<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INED</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .links {
            position: absolute;
            top: 10px; 
            right: 10px;
        }
        .links a {
            margin-right: 10px;
            text-decoration: none;
            padding: 8px 16px; 
            background-color: #FFD700;
            color: #000;
            border: 1px solid #FFD700;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .links a:hover {
            background-color: #FFC600;
        }
        h1 {
            font-size: 24px; 
            text-align: center;
            line-height: 1.5; 
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block links">
                @auth
                    <a href="{{ url('/home') }}">Menu Principal</a>
                @else
                    <a href="{{ route('login') }}">Inicio sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registro</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <h1>INED PROF. HUGO LEONEL SANCÉ CETINO</h1>
                    <div class="card-body">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img src="https://www.prensalibre.com/wp-content/uploads/2019/01/90deb39a-b64f-4550-b937-e96b0068b917.jpg?quality=52&w=760&h=430&crop=1" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="https://www.magisnet.com/wp-content/uploads/2019/02/19-02-20microsoft-1024x682.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                <img src="https://www.magisnet.com/wp-content/uploads/2022/07/maestros.jpg" class="d-block w-100" alt="...">
                                </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-7 mt-5 text-justify" style="background-color: gray;">
                                <div class="card-header text-center">Visión</div>
                                <p style="color: white;">Aspiramos a convertirnos en una comunidad de aprendizaje práctica 
                                e interdisciplinaria. Promover la formación de un profesional de la 
                                educación, conocedor de las disciplinas, las artes, la expresión del 
                                movimiento humano, la investigación y la tecnología. Capaz de crear y 
                                aplicar modelos efectivos en su práctica educativa. Un ente reflexivo y 
                                holístico que entiende, respeta y valora la diversidad. Que participe 
                                activamente con su comunidad y este comprometido con el aprendizaje de 
                                por vida.</p>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-7 mt-5 text-justify" style="background-color: gray;">
                                <div class="card-header text-center">Misión</div>
                                <p style="color: white;">Facilitar la formación de maestros reflexivos, críticos y sensitivos 
                                    en escuela elemental y secundaria.  Educadores con los conocimientos, 
                                    las destrezas y las disposiciones necesarias para atender las necesidades 
                                    fundamentales de sus educandos de manera que estos puedan responder a 
                                    las complejidades de la sociedad global y se conviertan en miembros 
                                    productivos de nuestra sociedad democrática.</p>
                            </div>
                        </div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>
</body>
</html>
