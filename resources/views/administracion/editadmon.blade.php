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
<div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                @if(session('actividadAdministrativoModificado'))
                <div class="alert alert-success">
                    {{ session('actividadAdministrativoModificado') }}
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
                <div class="title-container text-center">
                    <h1><i class="fas fa-user"></i> Formulario de Edición de Actividad Administrativa</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('editad', $editadmon->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-body">
                        <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-4">Código de actividad:</label>
                                    <input type="text" name="codigoadmon" class="form-control col-md-9" value="{{ $editadmon->codigoadmon }}">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-4">Nombre de actividad:</label>
                                    <input type="text" name="nombreact" class="form-control col-md-9" value=" {{ $editadmon->nombreact }}">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-4">Fecha:</label>
                                    <input type="date" name="fecha" class="form-control col-md-9" value="{{ $editadmon->fecha }}">
                                </div>
                                <div class="col-md-6"> 
                                    <label>Encargado de revisión e impresión</label>
                                        <select name="docente_id" class="form-control" >
                                            <option value="{{ $editadmon->docente_id }}">{{ $editadmon->docente->nombre }} {{ $editadmon->docente->apellido }}</option>
                                            @foreach( $docentes as $docente)
                                                <option value="{{$docente->id}}"> {{$docente->nombre}} {{$docente->apellido}}  </option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label form="" class="clo-4">Descripción:</label>
                                    <textarea class="form-control" type="text" name="descripcion" rows="2">{{ $editadmon->descripcion }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6"> 
                                    <label form="" class="clo-4">Archivo subido:</label>
                                    @if($editadmon->archivo)
                                        <a href="{{ asset('uploads/' . $editadmon->archivo) }}" target="_blank">Ver archivo</a>
                                    @else
                                        <span>No hay archivo adjunto</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12 text-center mt-4">
                                        <label></label>
                                        <button type="submit" class="btn btn-primary btn-block custom-btn-width">Editar</button>
                                        <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/listaradmon') }}">Cancelar</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection