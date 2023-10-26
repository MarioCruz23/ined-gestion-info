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
                        src="https://img.freepik.com/vector-gratis/formulario-documento-linea-acuerdo-digital-contrato-electronico-cuestionario-internet-hacer-lista-tenga-cuenta-boleta-votacion-ilustracion-concepto-elemento-diseno-plano-encuesta_335657-2013.jpg?w=740&t=st=1698268193~exp=1698268793~hmac=7aad2363fc6a168bdb7801e4a934eab5c49fab74d4e2400c45b2746a60282451">
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
                        src="https://img.freepik.com/vector-premium/icono-premium-analisis-crecimiento-estilo-plano_9206-4796.jpg?w=740">
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
                        src="https://img.freepik.com/vector-gratis/mano-que-sostiene-pluma-firmar-documento-papel-mujer-que-firma-acuerdo-legal-o-contrato-ilustracion-vectorial-plana-firma-trato-concepto-asociacion-banner-diseno-sitio-web-o-pagina-web-destino_74855-26012.jpg?w=740&t=st=1698269293~exp=1698269893~hmac=d389ebb97a857fc5027b9b15b8f1a3d20ce96179f71386af69beb2cfcc326401">
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
                        src="https://img.freepik.com/vector-premium/feliz-nino-lindo-nino-primer-dia-escuela-padre_97632-1713.jpg?w=740">
                </div>
                <div class="pie">
                    <h1 class="jj">Padre o encargado</h1>
                </div>
            </a>
        </div>
    </div>
</body>
@endsection
