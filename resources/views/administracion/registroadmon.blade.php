@extends('layouts.app')
<div class="container mt-5">
<div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                Mensaje flash 
                @if(session('actividadAdmonGuardado'))
                <div class="alert alert-success">
                    {{ session('actividadAdmonGuardado') }}
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
                    <form action="{{ route('saveadmon') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center">Agregar Actividad administrativa</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Código de actividad:</label>
                                <input type="text" name="codigoadmon" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre de actividad:</label>
                                <input type="text" name="nombreact" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Fecha:</label>
                                <input type="date" name="fecha" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Descripción</label>
                                <textarea class="form-control" type="text" name="descripcion" rows="3"></textarea>
                            </div>
                            <div class="row form-group">
                                <label for="" class="clo-2">Archivo o imagen</label>
                                <input class="form-control" type="file" name="archivo">
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