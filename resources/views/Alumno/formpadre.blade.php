@extends('layouts.app')
@section('content')
<style>.mint-bg {
    background-color: #FFB6C1;
    label {
        font-weight: bold;}
    }
</style>
<div class="container mt-5">
<div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('padreGuardado'))
                <div class="alert alert-success">
                    {{ session('padreGuardado') }}
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h1 style="text-align: center;">Agregar Padre o encargado</h1>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('savepadre') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre</label>
                                <input placeholder="Ejemplo: Dorian Emilio" type="text" name="nombre" class="form-control col-md-9">
                            </div>
                            <br>
                            <div class="row form-group">
                                <label form="" class="clo-2">Apellido</label>
                                <input placeholder="Ejemplos: Torres Aguilar" type="text" name="apellido" class="form-control col-md-9">
                            </div>
                            <br>
                            <div class="row form-group">
                                <label form="" class="clo-2">Teléfono</label>
                                <input placeholder="Ejemplo: 5467-3487" type="text" name="telefono" class="form-control col-md-9">
                            </div>
                            <br>
                            <div class="row form-group">
                                <label form="" class="clo-2">Dirección</label>
                                <input placeholder="Dirección o Colonia" type="text" name="direccion" class="form-control col-md-9">
                            </div>
                            <br>
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                    <div class="form-group">
                                        <label>Alumno a cargo</label>
                                        <select name="alumno_id" class="form-control" >
                                            <option value="">  --Seleccione--  </option>
                                            @foreach( $alumnoids as $alumnoid)
                                                <option value="{{$alumnoid->id}}"> {{$alumnoid->nombre}} {{$alumnoid->apellido}}  </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br>
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
