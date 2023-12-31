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
                        text: 'Se produjo un error al guardar la actividad administrativa.'
                    });
                }
            });
        });
    });
</script>
<div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
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
                <div class="title-container text-center">
                    <h1><i class="fas fa-user"></i> Formulario registro de Actividad Administrativa</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('saveadmon') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="codigoadmon" class="col-8">Código de actividad:</label>
                                    <input placeholder="ejemplo: A45T87U34" type="text" name="codigoadmon" id="codigoadmon" class="form-control col-md-9" maxlength="7" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '').substring(0, 7);">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-4">Nombre de actividad:</label>
                                    <input placeholder="ejemplo: OPF 2023" type="text" name="nombreact" class="form-control col-md-9"> 
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-4">Fecha:</label>
                                    <input type="date" name="fecha" class="form-control col-md-9">
                                </div>
                                <div class="col-md-6"> 
                                    <label>Encargado de revisión e impresión</label>
                                    <select name="docente_id" class="form-control text-center" >
                                        <option value="">--Seleccione--</option>
                                        @foreach( $docenteids as $docenteid)
                                            <option value="{{$docenteid->id}}"> {{$docenteid->nombre}} {{$docenteid->apellido}}  </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-12"> 
                                    <label for="" class="col-4">Archivo</label>
                                    <input class="form-control" type="file" name="archivo">
                                    @if(isset($admondata['archivo']))
                                        <div class="row form-group">
                                            <label class="col-4">Nombre del archivo:</label>
                                            <span>{{ basename($admondata['archivo']) }}</span>
                                        </div>
                                    @endif        
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label form="" class="clo-4">Descripción</label>
                                    <textarea class="form-control" type="text" name="descripcion" rows="2"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6 col-sm-12 mb-2 mb-md-0 text-center">
                                    <button type="submit" class="btn btn-primary custom-btn-width">Guardar</button>
                                </div>
                                <div class="col-md-6 col-sm-12 text-center"> 
                                    <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/menuadmon') }}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection