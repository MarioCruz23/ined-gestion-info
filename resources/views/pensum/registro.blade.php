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
                        text: 'Se produjo un error al guardar el pensum.'
                    });
                }
            });
        });
    });
</script>
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('pensumGuardado'))
                <div class="alert alert-success">
                    {{ session('pensumGuardado') }}
                </div>
                @endif
                <!-- validación de errores -->
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
                    <h1><i class="fas fa-user"></i> Formulario para Registro de Pensum</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('savepensum') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="" class="col-6">Subir Archivo</label>
                                    <input class="form-control col-md-6" type="file" name="archivopensum">
                                </div>
                                @if(isset($pensumdata['archivopensum']))
                                    <div class="row form-group">
                                        <label class="col-6">Nombre del archivo:</label>
                                        <span>{{ basename($pensumdata['archivopensum']) }}</span>
                                    </div>
                                @endif
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6"> 
                                    <label form="" class="clo-6">Nombre: </label>
                                    <input type="text" name="nombre" class="form-control col-md-6">
                                </div>
                                <div class="col-md-6"> 
                                    <div class="col-md-12 text-center mt-4">
                                        <label></label>
                                        <button type="submit" class="btn btn-primary btn-block custom-btn-width">Guardar</button>
                                        <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/menupensum') }}">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
