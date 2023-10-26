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
<script>
    $(document).ready(function () {
        $('form').submit(function (event) {
            event.preventDefault();
            var form = $(this);

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: data.message,
                    });
                },
                error: function (data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Se produjo un error al editar el graduando.'
                    });
                }
            });
        });
    });
</script>
<div class="container">
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
                @endif<div class="title-container text-center">
                    <h1><i class="fas fa-user"></i> Formulario de edición de Graduandos </h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('editgrad', $editgraduando->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-body">
                        <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-8">Código de estudiante:</label>
                                    <input type="text" name="codigoalu" class="form-control col-md-9" value="{{ $editgraduando->codigoalu }}">
                                </div>
                                <div class="col-md-6">
                                    <label form="" class="clo-8">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editgraduando->nombre }}">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-8">Apellido:</label>
                                    <input type="text" name="apellido" class="form-control col-md-9" value="{{ $editgraduando->apellido }}">
                                </div>
                                <div class="col-md-6">
                                    <label form="" class="clo-8">Fecha de graduación: </label>
                                    <input type="date" name="anio" class="form-control col-md-9" value="{{ $editgraduando->anio }}">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="titulo" class="col-form-label">Título:</label>
                                    @if($editgraduando->titulo)
                                        <a href="{{ asset('uploads/' . $editgraduando->titulo) }}" target="_blank">Ver archivo</a>
                                    @else
                                        <span>No hay archivo adjunto</span>
                                    @endif
                                    <input type="file" class="form-control" id="titulo" name="titulo">
                                </div>
                                <div class="col-md-6">
                                    <label for="constancia" class="col-form-label">Constancia:</label>
                                    @if($editgraduando->constancia)
                                        <a href="{{ asset('uploads/' . $editgraduando->constancia) }}" target="_blank">Ver archivo</a>
                                    @else
                                        <span>No hay archivo adjunto</span>
                                    @endif
                                    <input type="file" class="form-control" id="constancia" name="constancia">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6 mx-auto">
                                    <label>Pensum:</label>
                                    <select name="pensum_id" class="form-control text-center" >
                                        <option value="{{ $editgraduando->pensum_id }}">{{ $editgraduando->pensum->nombre }}</option>
                                        @foreach( $pensums as $pensum)
                                            <option value="{{$pensum->id}}"> {{$pensum->nombre}}  </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">                                
                                <div class="col-md-12 text-center mt-6">
                                    <button type="submit" class="btn btn-primary btn-block mx-2 custom-btn-small">Guardar</button>
                                    <a class="btn btn-danger btn-block custom-btn-small" href="{{ url('/listargraduando') }}">Cancelar</a>
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