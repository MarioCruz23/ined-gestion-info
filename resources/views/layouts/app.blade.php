<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>INED</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@500&display=swap');
        :root{
            --color-barra-lateral:rgb(255,255,255);
            --color-texto:rgb(0,0,0);
            --color-texto-menu:rgb(134,136,144);
            --color-menu-hover:rgb(238,238,238);
            --color-menu-hover-texto:rgb(0,0,0);
            --color-boton:rgb(0,0,0);
            --color-boton-texto:rgb(255,255,255);
            --color-linea:rgb(180,180,180);
            --color-switch-base :rgb(201,202,206);
            --color-switch-circulo:rgb(241,241,241);
            --color-scroll:rgb(192,192,192);
            --color-scroll-hover:rgb(134,134,134);
        }
        .dark-mode{
            --color-barra-lateral:rgb(44,45,49);
            --color-texto:rgb(255,255,255);
            --color-texto-menu:rgb(110,110,117);
            --color-menu-hover:rgb(0,0,0);
            --color-menu-hover-texto:rgb(238,238,238);
            --color-boton:rgb(255,255,255);
            --color-boton-texto:rgb(0,0,0);
            --color-linea:rgb(90,90,90);
            --color-switch-base :rgb(39,205,64);
            --color-switch-circulo:rgb(255,255,255);
            --color-scroll:rgb(68,69,74);
            --color-scroll-hover:rgb(85,85,85);
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }
        body{
            height: 100vh;
            width: 100%;
            background-color: darkcyan;
        }
        .menu{
            position: fixed;
            width: 50px;
            height: 50px;
            font-size: 30px;
            display: none;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            cursor: pointer;
            background-color: var(--color-boton);
            color: var(--color-boton-texto);
            right: 15px;
            top: 15px;
            z-index: 100;
        }
        .barra-lateral{
            position: fixed;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 250px;
            height: 100%;
            overflow: hidden;
            padding: 20px 15px;
            background-color: var(--color-barra-lateral);
            transition: width 0.5s ease,background-color 0.3s ease,left 0.5s ease;
            z-index: 50;
        }
        .mini-barra-lateral{
            width: 80px;
        }
        .barra-lateral span{
            width: 100px;
            white-space: nowrap;
            font-size: 18px;
            text-align: left;
            opacity: 1;
            transition: opacity 0.5s ease,width 0.5s ease;
        }
        .barra-lateral span.oculto{
            opacity: 0;
            width: 0;
        }
        .barra-lateral .nombre-pagina{
            width: 100%;
            height: 45px;
            color: var(--color-texto);
            margin-bottom: 40px;
            display: flex;
            align-items: center;
        }
        .barra-lateral .nombre-pagina ion-icon{
            min-width: 50px;
            font-size: 40px;
            cursor: pointer;
        }
        .barra-lateral .nombre-pagina span{
            margin-left: 5px;
            font-size: 25px;
        }
        .barra-lateral .boton{
            width: 100%;
            height: 45px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 10px;
            background-color: var(--color-boton);
            color: var(--color-boton-texto);
        }
        .barra-lateral .boton ion-icon{
            min-width: 50px;
            font-size: 25px;
        }
        .barra-lateral .navegacion{
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .barra-lateral .navegacion::-webkit-scrollbar{
            width: 5px;
        }
        .barra-lateral .navegacion::-webkit-scrollbar-thumb{
            background-color: var(--color-scroll);
            border-radius: 5px;
        }
        .barra-lateral .navegacion::-webkit-scrollbar-thumb:hover{
            background-color: var(--color-scroll-hover);
        }
        .barra-lateral .navegacion li{  
            list-style: none;
            display: flex;
            margin-bottom: 5px;
        }
        .barra-lateral .navegacion a{
            width: 100%;
            height: 45px;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-radius: 10px;
            color: var(--color-texto-menu);
        }
        .barra-lateral .navegacion a:hover{
            background-color: var(--color-menu-hover);
            color: var(--color-menu-hover-texto);
        }
        .barra-lateral .navegacion ion-icon{
            min-width: 50px;
            font-size: 20px;
        }
        .barra-lateral .linea{
            width: 100%;
            height: 1px;
            margin-top: 15px;
            background-color: var(--color-linea);
        }
        .barra-lateral .modo-oscuro{
            width: 100%;
            margin-bottom: 80px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
        }
        .barra-lateral .modo-oscuro .info{
            width: 150px;
            height: 45px;
            overflow: hidden;
            display: flex;
            align-items: center;
            color: var(--color-texto-menu);
        }
        .barra-lateral .modo-oscuro ion-icon{

            width: 50px;
            font-size: 20px;
        }
        .barra-lateral .modo-oscuro .switch{
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 50px;
            height: 45px;
            cursor: pointer;
        }
        .barra-lateral .modo-oscuro .base{
            position: relative;
            display: flex;
            align-items: center;
            width: 35px;
            height: 20px;
            background-color: var(--color-switch-base);
            border-radius: 50px;
        }
        .barra-lateral .modo-oscuro .circulo{
            position: absolute;
            width: 18px;
            height: 90%;
            background-color: var(--color-switch-circulo);
            border-radius: 50%;
            left: 2px;
            transition: left 0.5s ease;
        }
        .barra-lateral .modo-oscuro .circulo.prendido{
            left: 15px;
        }
        .barra-lateral .usuario{
            width: 100%;
            display: flex;
        }
        .barra-lateral .usuario img{
            width: 50px;
            min-width: 50px;
            border-radius: 10px;
        }
        .barra-lateral .usuario .info-usuario{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--color-texto);
            overflow: hidden;
        }
        .barra-lateral .usuario .nombre-email{
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-left: 5px;
        }
        .barra-lateral .usuario .nombre{
            font-size: 15px;
            font-weight: 600;
        }
        .barra-lateral .usuario .email{
            font-size: 13px;
        }
        .barra-lateral .usuario ion-icon{
            font-size: 20px;
        }
        #inbox{
            background-color: var(--color-menu-hover);
            color: var(--color-menu-hover-texto);
        }
        main{
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.5s ease;
        }
        main.min-main{
            margin-left: 80px;
        }
        @media (max-height: 660px){
            .barra-lateral .nombre-pagina{
                margin-bottom: 5px;
            }
            .barra-lateral .modo-oscuro{
                margin-bottom: 3px;
            }
        }
        @media (max-width: 600px) {
            .barra-lateral {
                position: fixed;
                left: -250px;
            }
            .max-barra-lateral {
                left: 0;
            }
            .menu {
                display: flex;
            }
            .menu ion-icon:nth-child(2) {
                display: none;
            }
            main {
                margin-left: 0;
            }
            main.min-main {
                margin-left: 0;
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const menuButton = document.querySelector(".menu");
            const barraLateral = document.querySelector(".barra-lateral");
            const textToHide = document.querySelectorAll(".text-to-hide");
            const main = document.querySelector("main");
            const cloud = document.getElementById("cloud");
            const spans = document.querySelectorAll("span");
            const palanca = document.querySelector(".switch");
            const circulo = document.querySelector(".circulo");
            menuButton.addEventListener("click", () => {
                barraLateral.classList.toggle("max-barra-lateral");
                barraLateral.style.left = barraLateral.classList.contains("max-barra-lateral") ? "0" : "-250px";
                if (barraLateral.classList.contains("max-barra-lateral")) {
                    menuButton.children[0].style.display = "none";
                    menuButton.children[1].style.display = "block";
                    textToHide.style.display = "none";
                } else {
                    menuButton.children[0].style.display = "block";
                    menuButton.children[1].style.display = "none";
                    textToHide.style.display = "block";
                }
                if (window.innerWidth <= 320) {
                    barraLateral.classList.add("mini-barra-lateral");
                    main.classList.add("min-main");
                    spans.forEach((span) => {
                        span.classList.add("oculto");
                    });
                }
            });

            palanca.addEventListener("click", () => {
                const body = document.body;
                body.classList.toggle("dark-mode");
                circulo.classList.toggle("prendido");
            });

            cloud.addEventListener("click", () => {
                barraLateral.classList.toggle("mini-barra-lateral");
                main.classList.toggle("min-main");
                spans.forEach((span) => {
                    span.classList.toggle("oculto");
                });
            });
        });
    </script>
</head>
<body style="background-color: #e3f2fd;">
<div class="menu">
    <ion-icon name="arrow-back-outline"></ion-icon>
</div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <ion-icon id="cloud" name="cloud-outline"></ion-icon>
                <span>INED</span>
            </div>
            <a id="menuToggle" class="boton" href="{{ url('/admin') }}">
                <ion-icon name="home-outline"></ion-icon>
                <span>Menú</span>
            </a>
        </div>
        <nav class="navegacion">
            <ul>
                <li>
                    <a href="{{ url('/menudocen') }}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Docentes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/menualu') }}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Estudiante</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/menuinscripcion') }}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Inscripción</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/menupadre') }}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Padre o encargado</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/menugraduandos') }}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Graduandos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/menuadmon') }}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Administración</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/menupensum') }}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Pensum</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/menucurso') }}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Curso</span>
                    </a>
                </li>
                @can('update', Auth::user())
                <li>
                    <a href="{{ url('/menuasignaciones') }}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Asignaciones</span>
                    </a>
                </li>
                @endcan
            </ul>
            <div class="linea"></div>
            <ul>
                <li>
                    <a href="{{ url('/home') }}">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Calendario Actividades</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div>
            <div class="linea"></div>
            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Dark Mode</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="linea"></div>
            <br>
            <div class="usuario" style="display: flex; justify-content: center; align-items: center;">
                @guest
                <div>
                    <div class="ocultar-con-barra text-center">
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}">
                            <ion-icon name="log-in-outline"></ion-icon>
                            <span>Iniciar Sesión</span>
                        </a>
                        @endif
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <ion-icon name="person-add-outline"></ion-icon>
                            <span>Registrarse</span>
                        </a>
                        @endif
                    </div>
                </div>
                @else
                <div class="nav-item" style="display: flex; align-items: center;">
    <a id="userDropdown" class="btn btn-warning user-button" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-size: 16px; padding: 5px 10px;">
        <ion-icon name="person-circle-outline" class="user-icon" style="font-size: 20px;"></ion-icon>
        <span class="user-name" style="font-size: 14px;">{{ Auth::user()->name }}</span>
    </a>
    
    <a class="btn btn-danger logout-button" style="font-size: 16px; padding: 5px 10px; margin-left: 5px;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <ion-icon name="close-circle-outline" class="logout-icon" style="font-size: 20px;"></ion-icon>
        <span class="logout-text" style="font-size: 14px;">{{ __('Cerrar Sesión') }}</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>




                @endguest
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <main class="py-4">
        @yield('content')
    </main>
</div>
<style>
    .ocultar-con-barra {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 15px; /* Ajusta según sea necesario */
}

.ocultar-con-barra ion-icon {
    font-size: 24px; /* Tamaño del ícono */
}

.ocultar-con-barra span {
    font-size: 14px; /* Tamaño del texto */
    margin-top: 5px; /* Espacio entre ícono y texto */
}

.text-center {
    text-align: center;
}

.text-hide {
    display: none; /* Ocultamos el texto */
}

.nav-item.dropdown {
    display: flex;
    align-items: center;
    justify-content: center; /* Centramos el contenido horizontalmente */
}
/* Ocultar texto en el botón de usuario cuando la barra está minimizada */
.mini-barra-lateral .user-name {
    display: none;
}

/* Ajustar el tamaño del botón de usuario cuando la barra está minimizada */
.mini-barra-lateral .user-button {
    width: 40px;
    height: 40px;
    padding: 0;
    font-size: 20px; /* Ajusta según tus preferencias */
}
.mini-barra-lateral .logout-text {
    display: none;
}
.mini-barra-lateral .logout-button {
    width: 40px;
    height: 40px;
    padding: 0;
    font-size: 10px; /* Ajusta según tus preferencias */
}
.mini-barra-lateral .user-icon {
    font-size: 20px;
}
.mini-barra-lateral .logout-icon {
    font-size: 10px;
}
/* Ajustar el tamaño del icono en el botón que despliega el menú cuando la barra está minimizada */
.mini-barra-lateral .dropdown-toggle .user-icon,
.mini-barra-lateral .dropdown-toggle .dropdown-toggle-icon {
    font-size: 20px; /* Ajusta según tus preferencias */
}
</style>
</body>
</html>
