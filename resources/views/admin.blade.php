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
                        src="https://img.freepik.com/vector-premium/nino-estudiante-dibujos-animados-suministros_18591-2863.jpg?w=740">
                </div>
                <div class="pie">
                    <h1 class="jj">Estudiantes</h1>
                </div>
            </a>
        </div>
        <div class="galeria">
            <a href="">
                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-gratis/grupo-personas-que-graduan-ilustrado_23-2148571139.jpg?w=740&t=st=1694844901~exp=1694845501~hmac=d8c4be615c993d48bbae61b1724e173ef22a627aaed6851cbfa16d7d43bf2c1e">
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
                        src="https://img.freepik.com/vector-premium/gerente-administrador-hombre-hotel_51635-7414.jpg?w=740">
                </div>
                <div class="pie">
                    <h1 class="jj">Administración</h1>
                </div>
            </a>
        </div>
        <div class="galeria">
            <a href="">
                <div class="ima">
                    <img class="m"
                        src="https://img.freepik.com/vector-premium/viejo-libro-abierto-ilustracion-vector-texto-abstracto-estilo-dibujos-animados_543641-1011.jpg?w=2000">
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
                        src="https://previews.123rf.com/images/iconicbestiary/iconicbestiary1602/iconicbestiary160200011/53122280-lecci%C3%B3n-de-la-escuela-los-peque%C3%B1os-estudiantes-y-el-profesor-aula-con-pizarra-verde-mesa-de-los.jpg">
                </div>
                <div class="pie">
                    <h1 class="jj">Cursos</h1>
                </div>
            </a>
        </div>
    </div>
</body>
@endsection
