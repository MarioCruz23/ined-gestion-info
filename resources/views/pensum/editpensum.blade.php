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
                @if(session('pensumModificado'))
                <div class="alert alert-success">
                    {{ session('pensumModificado') }}
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
                    <h1><i class="fas fa-user"></i> Formulario de edición de Pensum</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('editpen', $editpensum->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label form="" class="clo-6">Archivo Subido:</label>
                                    @if($editpensum->archivopensum)
                                        <a href="{{ asset('uploads/' . $editpensum->archivopensum) }}" target="_blank">Ver archivo</a>
                                    @else
                                        <span>No hay archivo adjunto</span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6"> 
                                    <label form="" class="clo-6">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editpensum->nombre }}">
                                </div>
                                <div class="col-md-6"> 
                                    <div class="col-md-12 text-center mt-4">
                                        <label></label>
                                        <button type="submit" class="btn btn-primary btn-block custom-btn-width">Editar</button>
                                        <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/listarpensum') }}">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection