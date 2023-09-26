@extends('layouts.app')
@section('content')
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
                                </div>
                            @endif
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-2">Constancia:</label>
                                <input class="form-control" type="file" name="constancia">
                            </div>
                            @if(isset($graduandodata['constancia']))
                                <div class="row form-group">
                                    <label class="col-2">Nombre del archivo:</label>
                                    <span>{{ basename($graduandodata['constancia']) }}</span>
                                </div>
                            @endif
                            </div>
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