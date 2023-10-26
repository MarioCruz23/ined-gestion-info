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
                data: form.serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.message === 'Datos del padre o encargado modificados exitosamente') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: data.message,
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message,
                        });
                    }
                },
                error: function (data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Se produjo un error al modificar los datos del padre o encargado.'
                    });
                }
            });
        });
    });
</script>
<div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('padreModificado'))
                <div class="alert alert-success">
                    {{ session('padreModificado') }}
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
                    <h1><i class="fas fa-user"></i> Modificar Padre o encargado</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('editencargado', $editpadre->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                <label form="" class="clo-2">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editpadre->nombre }}">
                                </div>
                                <div class="col-md-6"> 
                                <label form="" class="clo-2">Apellido</label>
                                <input type="text" name="apellido" class="form-control col-md-9" value="{{ $editpadre->apellido }}">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                <label form="" class="clo-2">Teléfono</label>
                                <input type="text" name="telefono" class="form-control col-md-9" value="{{ $editpadre->telefono }}">
                                </div>
                                <div class="col-md-6"> 
                                <label form="" class="clo-2">Dirección</label>
                                <input type="text" name="direccion" class="form-control col-md-9" value="{{ $editpadre->direccion }}">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alumno a cargo</label>
                                        <select name="alumno_id" class="form-control" >
                                            <option value="{{ $editpadre->alumno_id }}">{{ $editpadre->alumno->nombre }} {{ $editpadre->alumno->apellido }}</option>
                                            @foreach( $alumnos as $alumno)
                                                <option value="{{$alumno->id}}"> {{$alumno->nombre}} {{$alumno->apellido}}  </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <label></label>
                                    <div class="col-md-12 text-center mt-6">
                                        <button type="submit" class="btn btn-primary  btn-block mx-2 custom-btn-width">Guardar</button>
                                        <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/listarpadre') }}">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
