@extends('layouts.app')
<div class="container mt-5">
<div class="container mt-5">
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
                <div class="card">
                    <form action="{{ route('editad', $editadmon->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-header text-center">Modificar Actividad Administrativa</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Código de actividad:</label>
                                <input type="text" name="codigoadmon" class="form-control col-md-9" value="{{ $editadmon->codigoadmon }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre de actividad:</label>
                                <input type="text" name="nombreact" class="form-control col-md-9" value=" {{ $editadmon->nombreact }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Fecha:</label>
                                <input type="date" name="fecha" class="form-control col-md-9" value="{{ $editadmon->fecha }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Descripción:</label>
                                <textarea class="form-control" type="text" name="descripcion" rows="3">{{ $editadmon->descripcion }}</textarea>
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Archivo o imagen:</label>
                                @if($editadmon->archivo)
                                    <a href="{{ asset('uploads/' . $editadmon->archivo) }}" target="_blank">Ver archivo</a>
                                @else
                                    <span>No hay archivo adjunto</span>
                                @endif
                            </div>
                            </div>
                            <div class="row form-group">
                                <button type="submit" class="btn btn-success col-md-9 offset-2">Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
