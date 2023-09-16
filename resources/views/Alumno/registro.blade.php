@extends('layouts.app')
@section('content')
<div class="container mt-5">
<div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('alumnoGuardado'))
                <div class="alert alert-success">
                    {{ session('alumnoGuardado') }}
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
                <div class="card">
                    <form action="{{ route('savealumno') }}" method="POST">
                        @csrf
                        <div class="card-header text-center">Agregar Estudiante</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Código Estudiante</label>
                                <input type="text" name="codigoes" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Apellido</label>
                                <input type="text" name="apellido" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Edad</label>
                                <input type="text" name="edad" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Fecha de nacimiento</label>
                                <input type="date" name="fechanac" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Teléfono</label>
                                <input type="text" name="telefono" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Dirección</label>
                                <input type="text" name="direccion" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Correo</label>
                                <input type="text" name="correo" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">CUI</label>
                                <input type="text" name="cui" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label for="genero" class="col-2">Género</label>
                                <div class="col-md-9">
                                    <select name="genero" id="genero" class="form-control">
                                    <option selected>Selecciones genero</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
