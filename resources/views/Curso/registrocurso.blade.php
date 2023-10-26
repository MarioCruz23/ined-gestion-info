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
                        text: 'Se produjo un error al guardar el curso.'
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
                @if(session('cursoGuardado'))
                <div class="alert alert-success">
                    {{ session('cursoGuardado') }}
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
                    <h1><i class="fas fa-user"></i> Formulario para Registro de Curso</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('savecurso') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-2">Código curso:</label>
                                    <input placeholder="Ejemplo: 45ER4512" type="text" name="codigocurso" class="form-control col-md-9">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-2">Nombre:</label>
                                    <input placeholder="Ejemplo: Psicobiología" type="text" name="nombre" class="form-control col-md-9">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-2">Área:</label>
                                    <input placeholder="Ejemplo: Psicología" type="text" name="area" class="form-control col-md-9">
                                </div>
                                <div class="col-md-6"> 
                                    <label>Pensum:</label>
                                        <select name="pensum_id" class="form-control tex-center" >
                                            <option value="">--Seleccione--</option>
                                            @foreach( $pensumids as $pensumid)
                                                <option value="{{$pensumid->id}}"> {{$pensumid->nombre}} </option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary custom-btn-width">Guardar</button>
                                </div>
                                <div class="col-md-6"> 
                                    <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/menucurso') }}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
