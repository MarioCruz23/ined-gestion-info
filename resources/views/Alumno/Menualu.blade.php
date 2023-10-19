@extends('layouts.app')

@section('content')
<style>
    .j {
        color: white;
        text-shadow: 1px 2px 2px black, 0 0 25px blue, 0 0 15px blue;
        text-align: center;
        margin: 13px 10px;
    }
    .jj {
        color: white;
        text-shadow: 1px 2px 2px black, 0 0 25px blue, 0 0 15px blue;
        text-align: center;
        margin: 42px 10px;
    }
    .jjj {
        color: white;
        text-shadow: 1px 2px 2px black, 0 0 25px blue, 0 0 15px blue;
        text-align: center;
        margin: 1px 10px;
    }
    .menu-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }
    .galeria {
        margin: 10px;
        width: 280px; 
        height: 280px; 
        box-shadow: 0 4px 8px 0 lightblue, 0 10px 20px rgb(0, 0, 0, 0.30);
    }
    .m {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .pie {
        text-align: center;
        text-shadow: 2px 2px 2px purple;
        padding: 2px;
        
    }
</style>
<body>
    <h1 class="j">Menú de gestión de Estudiantes</h1>
    <div class="d-grid gap-2 col-5 mx-auto">
        <a class="btn btn-outline-info" href="{{ url('/admin') }}">Menú Principal</a>
    </div>
    <br>
    <div class="menu-container">
        <div class="galeria">
            <a href="{{ url('/formalumno') }}">

                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-premium/icono-carpeta-archivo-estilo-dibujos-animados-3d-concepto-gestion-archivos_567896-233.jpg?w=740">
                </div>
                <div class="pie">
                    <h1 class="jj">Registro</h1>
                </div>
            </a>
        </div>
        <div class="galeria">
            <a href="{{ url('/listaralumno') }}">
                <div class="ima">
                    <img class="m"
                        src="https://proprofs-cdn.s3.amazonaws.com/images/FC/user_images/misc/10584445979.png">
                </div>
                <div class="pie">
                    <h1 class="jj">Reporte</h1>
                </div>
            </a>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="menu-container">
        <div class="galeria">
            <a href="{{ url('/menuinscripcion') }}">

                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-premium/icono-carpeta-archivo-estilo-dibujos-animados-3d-concepto-gestion-archivos_567896-233.jpg?w=740">
                </div>
                <div class="pie">
                    <h1 class="jj">Inscripción</h1>
                </div>
            </a>
        </div>
        <div class="galeria">
            <a href="{{ url('/menupadre') }}">
                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-gratis/familia-padres-ninos-dibujos-animados_18591-52204.jpg?w=740&t=st=1694899846~exp=1694900446~hmac=229ac724a7605be771f18a79a91ba7d89c108c598ab25b1b8d9847d938ec071f">
                </div>
                <div class="pie">
                    <h1 class="jj">Padre o encargado</h1>
                </div>
            </a>
        </div>
    </div>
</body>
@endsection
