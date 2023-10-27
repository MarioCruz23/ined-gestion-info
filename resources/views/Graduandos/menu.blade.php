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
    @media (max-width: 767px) {
        .galeria {
            width: 100%;
            max-width: 120px;
            height: 120px;
        }
        .jj {
            font-size: 14px;
        }
        .jjj {
            font-size: 14px;
        }
    }
</style>
<body>
    <h1 class="j">Menú de gestión de Graduandos</h1>
    <div class="menu-container">
        <div class="galeria">
            <a href="{{ url('/formgraduando') }}">

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
            <a href="{{ url('/listargraduando') }}">
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
</body>
@endsection
