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
        box-shadow: 0 4px 8px 0 lightblue, 0 10px 20px rgba(0, 0, 0, 0.30);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        text-align: center;
    }
    .galeria a {
        display: block;
        width: 100%;
        height: 100%;
    }
    .m {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    .pie {
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
    <h1 class="j">Menú de gestiones</h1>
    <div class="menu-container">
        <div class="galeria">
            <a href="{{ url('/menudocen') }}">

                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-premium/ilustracion-dibujos-animados-maestro-masculino-sosteniendo-palo-frente-pizarra_49924-311.jpg?w=2000">
                </div>
                <div class="pie">
                    <h1 class="jj">Docentes</h1>
                </div>
            </a>
        </div>
        <div class="galeria">
            <a href="{{ url('/menualu') }}">
                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-premium/ninos-escuela-paran-sosteniendo-libros-mochilas-personajes-dibujos-animados_181870-580.jpg?w=740">
                </div>
                <div class="pie">
                    <h1 class="jj">Estudiantes</h1>
                </div>
            </a>
        </div>
        <div class="galeria">
            <a href="{{ url('/menugraduandos') }}">
                <div class="ima">
                    <img class="m"
                        src="https://trabalhosacademicos.com.br/wp-content/uploads/2021/06/Depositphotos_318276402_l-2015-1536x1536.jpg">
                </div>
                <div class="pie">
                    <h1 class="jj">Graduandos</h1>
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
            <a href="{{ url('/menuadmon') }}">
                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-gratis/mujer-negocios-haciendo-varias-tareas-al-mismo-tiempo_23-2148826315.jpg?w=740&t=st=1698266773~exp=1698267373~hmac=dd2ef30afa37bf0f982793211890899356174605f31784d21c56ea57944fae01">
                </div>
                <div class="pie">
                    <h1 class="jj">Administración</h1>
                </div>
            </a>
        </div>
        <div class="galeria">
            <a href="{{ url('/menupensum') }}">
                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-gratis/personajes-libros-coloridos-dibujos-animados-diferentes-acciones-establecidas_74855-25054.jpg?w=740&t=st=1698266979~exp=1698267579~hmac=bab13b8a04cf82a3bf10bff80a2e02ff9fa964203c6e416aff7e7c78653518e6">
                </div>
                <div class="pie">
                    <h1 class="jj">Pensum</h1>
                </div>
            </a>
        </div>
        <div class="galeria">
            <a href="{{ url('/menucurso') }}">
                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-gratis/cursos-tutoriales-linea_23-2148533000.jpg?w=740&t=st=1698267103~exp=1698267703~hmac=f045d25b1e77d166b43098bfbba316c03eab939e836255efa0506020c834cb76">
                </div>
                <div class="pie">
                    <h1 class="jj">Cursos</h1>
                </div>
            </a>
        </div>
    </div>
    <br><br><br><br>
    @can('update', Auth::user())
    <div class="menu-container">
        <div class="galeria">
            <a href="{{ url('/menuasignaciones') }}">
                <div class="ima">
                    <img class="m" src="https://img.freepik.com/foto-gratis/ilustracion-3d-mano-poniendo-garrapata-papel_107791-15903.jpg?w=740&t=st=1698267254~exp=1698267854~hmac=59a6b9500e87ed4b0dafa8384c91b47aa17fda619c040342ec4d0025c23537a1">
                </div>
                <div class="pie">
                    <h1 class="jj">Asignaciones</h1>
                </div>
            </a>
        </div>
    </div>
    @endcan
</body>
@endsection
