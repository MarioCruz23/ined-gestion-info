@extends('layouts.app')
@section('content')
<style>
    .mint-bg {
        background-color: #FFB6C1;
        padding: 20px;
        border: 1px solid black;
    }
    .mint-bg label {
        font-weight: bold; 
    }
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        appearance: none;
        margin: 0;
    }
    .custom-btn-width {
    width: 46%;
    }
    .title-container {
        text-align: center;
    }
    .title-container h1 {
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .title-container i {
        font-size: 36px;
        margin-right: 10px;
    }
</style>
<script>
    document.getElementById("telefono").addEventListener("input", function () {
        const telefonoInput = this.value.trim(); 
        if (telefonoInput.length > 8) {
            this.value = telefonoInput.slice(0, 8);
        }
    });
</script>
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('docenteGuardado'))
                <div class="alert alert-success">
                    {{ session('docenteGuardado') }}
                </div>
                @endif
                <!-- validación de errores -->
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="title-container text-center">
                    <h1><i class="fas fa-user"></i> Formulario para Registrar Docente</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('savedocente') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="nombre" class="col-4 font-weight">Nombre:</label>
                                    <input placeholder="Ejemplo: Dorian Emilio" type="text" name="nombre" class="form-control col-md-8">
                                </div>
                                <div class="col-md-6"> 
                                    <label for="apellido" class="col-4 font-weight-bold">Apellido:</label>
                                    <input placeholder="Carrasco Torres" type="text" name="apellido" class="form-control col-md-8">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                            <div class="col-md-6"> 
                                    <label for="fechanac" class="col-8">Fecha de nacimiento:</label>
                                    <input type="date" name="fechanac" class="form-control col-md-8" min="1965-01-01" max="2004-12-31">
                                </div>
                                <div class="col-md-6"> 
                                    <label for="edad" class="col-4">Edad:</label>
                                    <input placeholder="ejemplo: 22" type="number" name="edad" class="form-control col-md-8">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="telefono" class="col-4">Teléfono:</label>
                                    <input placeholder="ejemplo: 54967895" type="text" name="telefono" id="telefono" class="form-control col-md-9">
                                </div>

                                <div class="col-md-6">
                                    <label for="correo" class="col-4">Correo:</label>
                                    <input placeholder="nombre@ejemplo.com" type="email" name="correo" class="form-control col-md-8">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <label for="direccion" class="col-3">Dirección:</label>
                                <input placeholder="Dirección exacta o colonia" type="text" name="direccion" class="form-control col-md-7">
                            </div>
                            <br>
                            <div class="row form-group align-items-center">
                            <div class="col-md-6">
                                <label for="genero" class="col-4">Género:</label>
                                <div class="col-md-12">
                                    <select name="genero" id="genero" class="form-control">
                                        <option selected>Seleccione género</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary  btn-block mx-2 custom-btn-width">Guardar</button>
                                    <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/menudocen') }}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
