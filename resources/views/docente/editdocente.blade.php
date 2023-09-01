@extends('layouts.app')
    <div class="container mt-5">
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
                <div class="card">
                    <form action="{{ route('edit', $editdocente->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-header text-center">Modificar Docente</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editdocente->nombre }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Apellido</label>
                                <input type="text" name="apellido" class="form-control col-md-9" value="{{ $editdocente->apellido }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Edad</label>
                                <input type="text" name="edad" class="form-control col-md-9" value="{{ $editdocente->edad }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Fecha de nacimiento</label>
                                <input type="date" name="fechanac" class="form-control col-md-9" value="{{ $editdocente->fechanac }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Teléfono</label>
                                <input type="text" name="telefono" class="form-control col-md-9" value="{{ $editdocente->telefono }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Dirección</label>
                                <input type="text" name="direccion" class="form-control col-md-9" value="{{ $editdocente->direccion }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Correo</label>
                                <input type="text" name="correo" class="form-control col-md-9" value="{{ $editdocente->correo }}">
                            </div>
                            <div class="row form-group">
                                <label for="genero" class="col-2">Género</label>
                                <div class="col-md-9">
                                    <select name="genero" id="genero" class="form-control">
                                        @foreach($generos as $genero)
                                            <option value="{{ $genero }}" @if($editdocente->genero === $genero) selected @endif>{{ $genero }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar Edición</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
