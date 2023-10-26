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
            @if(session('docenteModificado'))
            <div class="alert alert-success">
                {{ session('docenteModificado') }}
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
                <h1><i class="fas fa-user"></i> Formulario de edición de registro de Docente</h1>
            </div>
            <br>
            <div class="card mint-bg">
                <form action="{{ route('edit', $editdocente->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label form="" class="col-4">Nombre: </label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editdocente->nombre }}">
                            </div>
                            <div class="col-md-6"> 
                                <label form="" class="col-4">Apellido: </label>
                                <input type="text" name="apellido" class="form-control col-md-9" value="{{ $editdocente->apellido }}">
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label form="" class="col-8">Fecha de nacimiento: </label>
                                <input type="date" name="fechanac" class="form-control col-md-9" value="{{ $editdocente->fechanac }}">
                            </div>
                            <div class="col-md-6"> 
                                <label form="" class="col-4">Edad: </label>
                                <input type="text" name="edad" class="form-control col-md-9" value="{{ $editdocente->edad }}">
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label form="" class="col-4">Teléfono: </label>
                                <input type="number" name="telefono" id="telefono" class="form-control col-md-9" value="{{ $editdocente->telefono }}">
                            </div>
                            <div class="col-md-6"> 
                                <label form="" class="col-4">Correo: </label>
                                <input type="text" name="correo" class="form-control col-md-9" value="{{ $editdocente->correo }}">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <label form="" class="col-4">Dirección: </label>
                            <input type="text" name="direccion" class="form-control col-md-9" value="{{ $editdocente->direccion }}">
                        </div>
                        <br>
                        <div class="row form-group align-items-center">
                            <div class="col-md-6">
                                <label for="genero" class="col-4">Género: </label>
                                <div class="col-md-12">
                                    <select name="genero" id="genero" class="form-control">
                                        @foreach($generos as $genero)
                                            <option value="{{ $genero }}" @if($editdocente->genero === $genero) selected @endif>{{ $genero }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary  btn-block mx-2 custom-btn-width">Guardar Edición</button>    
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
