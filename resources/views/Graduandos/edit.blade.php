@extends('layouts.app')
@section('content')
<div class="container mt-5">
<div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                @if(session('graduandoModificado'))
                <div class="alert alert-success">
                    {{ session('graduandoModificado') }}
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
                    <form action="{{ route('editgrad', $editgraduando->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-header text-center">Formulario de edición de Graduandos</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Código de estudiante:</label>
                                <input type="text" name="codigoalu" class="form-control col-md-9" value="{{ $editgraduando->codigoalu }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre:</label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editgraduando->nombre }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Apellido:</label>
                                <input type="text" name="apellido" class="form-control col-md-9" value="{{ $editgraduando->apellido }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Año de graduación: </label>
                                <input type="date" name="anio" class="form-control col-md-9" value="{{ $editgraduando->anio }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Título:</label>
                                @if($editgraduando->titulo)
                                    <a href="{{ asset('uploads/' . $editgraduando->titulo) }}" target="_blank">Ver archivo</a>
                                @else
                                    <span>No hay archivo adjunto</span>
                                @endif
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Constancia:</label>
                                @if($editgraduando->constancia)
                                    <a href="{{ asset('uploads/' . $editgraduando->constancia) }}" target="_blank">Ver archivo</a>
                                @else
                                    <span>No hay archivo adjunto</span>
                                @endif
                            </div>
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                    <div class="form-group">
                                        <label>Pensum:</label>
                                        <select name="pensum_id" class="form-control" >
                                            <option value="{{ $editgraduando->pensum_id }}">{{ $editgraduando->pensum->nombre }}</option>
                                            @foreach( $pensums as $pensum)
                                                <option value="{{$pensum->id}}"> {{$pensum->nombre}}  </option>
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