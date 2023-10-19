@extends('layouts.app')
@section('content')
<style>
    .download-link {
        text-decoration: none;
    }

    .download-icon {
        margin-left: 5px; /* Espacio entre el texto y el ícono */
        color: #007bff; /* Color del ícono de descarga */
    }
</style>
<div class="container mt-5">
<div class="container mt-5">
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
                <div class="card">
                    <form action="{{ route('savegraduando') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center">Agregar Graduando</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Código de estudiante:</label>
                                <input type="text" name="codigoalu" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre:</label>
                                <input type="text" name="nombre" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Apellido:</label>
                                <input type="text" name="apellido" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Año de graduación: </label>
                                <input type="date" name="anio" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-2">Título:</label>
                                <input class="form-control" type="file" name="titulo">
                            </div>
                            @if(isset($graduandodata['titulo']))
                            <div class="row form-group">
                                <label class="col-2">Nombre del archivo:</label>
                                <span>{{ basename($graduandodata['titulo']) }}</span>
                                <a href="{{ asset($graduandodata['titulo']) }}" download class="download-link">
                                    Descargar <img src="https://static.vecteezy.com/system/resources/previews/018/938/905/non_2x/upload-or-add-new-document-file-button-concept-illustration-flat-design-eps10-simple-and-modern-graphic-element-for-landing-page-empty-state-ui-infographic-button-icon-vector.jpg" alt="Descargar" class="download-icon">
                                </a>
                            </div>
                            @endif
                            <div class="row form-group">
                                <label for="" class="col-2">Constancia:</label>
                                <input class="form-control" type="file" name="constancia">
                            </div>
                            @if(isset($graduandodata['constancia']))
                            <div class="row form-group">
                                <label class="col-2">Nombre del archivo:</label>
                                <span>{{ basename($graduandodata['constancia']) }}</span>
                                <a href="{{ asset($graduandodata['constancia']) }}" download class="download-link">
                                    Descargar <img src="https://cdn.vectorstock.com/i/1000x1000/12/36/server-upload-web-hosting-icon-image-vector-17691236.webp" alt="Descargar" class="download-icon">
                                </a>
                            </div>
                            @endif
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                    <div class="form-group">
                                        <label>Pensum:</label>
                                        <select name="pensum_id" class="form-control" >
                                            <option value="">--Seleccione--</option>
                                            @foreach( $pensumids as $pensumid)
                                                <option value="{{$pensumid->id}}"> {{$pensumid->nombre}}  </option>
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