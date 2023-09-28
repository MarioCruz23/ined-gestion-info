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
    <h1 class="j">Menú de gestión de Cursos</h1>
    <div>
        <a class="btn btn-success mb-4" href="{{ url('/admin') }}">Menú Principal</a>
    </div>
    <div class="menu-container">
        <div class="galeria">
            <a href="{{ url('/menuasignación') }}">

                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-premium/icono-carpeta-archivo-estilo-dibujos-animados-3d-concepto-gestion-archivos_567896-233.jpg?w=740">
                </div>
                <div class="pie">
                    <h1 class="jj">Asignación de cursos</h1>
                </div>
            </a>
        </div>
        <div class="galeria">
            <a href="{{ url('/listarol') }}">
                <div class="ima">
                    <img class="m"
                        src="https://proprofs-cdn.s3.amazonaws.com/images/FC/user_images/misc/10584445979.png">
                </div>
                <div class="pie">
                    <h1 class="jj">Asignación de roles de usuario</h1>
                </div>
            </a>
        </div>
    </div>
</body>
@endsection