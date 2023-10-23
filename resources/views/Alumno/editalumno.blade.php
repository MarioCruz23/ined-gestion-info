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
                @if(session('alumnoModificado'))
                <div class="alert alert-success">
                    {{ session('alumnoModificado') }}
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
                    <h1><i class="fas fa-user"></i> Formulario de Edición de Registro de  Estudiante</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('editalu', $editalumno->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-2">Código Estudiante: </label>
                                    <input type="text" name="codigoes" class="form-control col-md-9" value="{{ $editalumno->codigoes }}">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-2">Nombre</label>
                                    <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editalumno->nombre }}">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-2">Apellido</label>
                                    <input type="text" name="apellido" class="form-control col-md-9" value="{{ $editalumno->apellido }}">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-2">Edad</label>
                                    <input type="text" name="edad" class="form-control col-md-9" value="{{ $editalumno->edad }}">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-2">Fecha de nacimiento</label>
                                    <input type="date" name="fechanac" class="form-control col-md-9" value="{{ $editalumno->fechanac }}">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-2">Teléfono</label>
                                    <input type="text" name="telefono" class="form-control col-md-9" value="{{ $editalumno->telefono }}">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-2">Dirección</label>
                                    <input type="text" name="direccion" class="form-control col-md-9" value="{{ $editalumno->direccion }}">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-2">Correo</label>
                                    <input type="text" name="correo" class="form-control col-md-9" value="{{ $editalumno->correo }}">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-2">CUI: </label>
                                    <input type="number" name="cui" class="form-control col-md-9" value="{{ $editalumno->cui }}">
                                </div>
                                <div class="col-md-6"> 
                                    <label for="genero" class="col-4">Género:</label>
                                    <div class="col-md-12">
                                        <select name="genero" id="genero" class="form-control">
                                            @foreach($generos as $genero)
                                                <option value="{{ $genero }}" @if($editalumno->genero === $genero) selected @endif>{{ $genero }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">                                
                                <div class="col-md-12 text-center mt-6">
                                    <button type="submit" class="btn btn-primary  btn-block mx-2 custom-btn-width">Editar</button>
                                    <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/listaralumno') }}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
