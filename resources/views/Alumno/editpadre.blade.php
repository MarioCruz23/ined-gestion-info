@extends('layouts.app')
@section('content')
<div class="container mt-5">
<div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('padreModificado'))
                <div class="alert alert-success">
                    {{ session('padreModificado') }}
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
                    <form action="{{ route('editencargado', $editpadre->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-header text-center">Modificar Padre o encargado</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editpadre->nombre }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Apellido</label>
                                <input type="text" name="apellido" class="form-control col-md-9" value="{{ $editpadre->apellido }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Teléfono</label>
                                <input type="text" name="telefono" class="form-control col-md-9" value="{{ $editpadre->telefono }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Dirección</label>
                                <input type="text" name="direccion" class="form-control col-md-9" value="{{ $editpadre->direccion }}">
                            </div>
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                    <div class="form-group">
                                        <label>Alumno a cargo</label>
                                        <select name="alumno_id" class="form-control" >
                                            <option value="{{ $editpadre->alumno_id }}">{{ $editpadre->alumno->nombre }} {{ $editpadre->alumno->apellido }}</option>
                                            @foreach( $alumnos as $alumno)
                                                <option value="{{$alumno->id}}"> {{$alumno->nombre}} {{$alumno->apellido}}  </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
