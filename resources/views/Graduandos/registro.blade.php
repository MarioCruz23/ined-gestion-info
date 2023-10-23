@extends('layouts.app')
@section('content')
<style>
    .download-link {
        text-decoration: none;
    }
    .custom-btn-small {
        width: 100px;
    }
    .download-icon {
        margin-left: 5px; 
        color: #007bff; 
    }
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
                @if(session('graduandoGuardado'))
                <div class="alert alert-success">
                    {{ session('graduandoGuardado') }}
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
                    <h1><i class="fas fa-user"></i> Formulario de registro Graduando </h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('savegraduando') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label class="col-8">Código de estudiante:</label>
                                    <input placeholder="ejemplo: A45T87U34" type="text" name="codigoalu" class="form-control col-md-9">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-6">Nombre:</label>
                                    <input placeholder="Ejemplo: Dorian Emilio" type="text" name="nombre" class="form-control col-md-9">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label class="col-6">Apellido:</label>
                                    <input placeholder="Ejemplo: Carrasco Torres" type="text" name="apellido" class="form-control col-md-9">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-8">Fecha de graduación:</label>
                                    <input type="date" name="anio" class="form-control col-md-9" min="2015-01-01" max="2030-12-31">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-10 mx-auto">
                                    <label class="col-6">Título:</label>
                                    <input class="form-control" type="file" name="titulo">
                                    @if(isset($graduandodata['titulo']))
                                    <label class="col-2">Nombre del archivo:</label>
                                    <span>{{ basename($graduandodata['titulo']) }}</span>
                                    <a href="{{ asset($graduandodata['titulo']) }}" download class="download-link">
                                        Descargar <img src="https://static.vecteezy.com/system/resources/previews/018/938/905/non_2x/upload-or-add-new-document-file-button-concept-illustration-flat-design-eps10-simple-and-modern-graphic-element-for-landing-page-empty-state-ui-infographic-button-icon-vector.jpg" alt="Descargar" class="download-icon">
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-10 mx-auto">
                                    <label class="col-6">Constancia:</label>
                                    <input class="form-control" type="file" name="constancia">
                                    @if(isset($graduandodata['constancia']))
                                    <label class="col-2">Nombre del archivo:</label>
                                    <span>{{ basename($graduandodata['constancia']) }}</span>
                                    <a href="{{ asset($graduandodata['constancia']) }}" download class="download-link">
                                        Descargar <img src="https://cdn.vectorstock.com/i/1000x1000/12/36/server-upload-web-hosting-icon-image-vector-17691236.webp" alt="Descargar" class="download-icon">
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6 mx-auto">
                                    <label class="col-6">Pensum:</label>
                                    <select name="pensum_id" class="form-control text-center">
                                        <option value="">--Seleccione--</option>
                                        @foreach( $pensumids as $pensumid)
                                        <option value="{{$pensumid->id}}"> {{$pensumid->nombre}}  </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">                                
                                <div class="col-md-12 text-center mt-6">
                                    <button type="submit" class="btn btn-primary btn-block mx-2 custom-btn-small">Guardar</button>
                                    <a class="btn btn-danger btn-block custom-btn-small" href="{{ url('/menugraduandos') }}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection