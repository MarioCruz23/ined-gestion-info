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
    function validarTelefono(input) {
        const valor = input.value.trim();
        const regex = /^[0-9]{1,8}$/;
        if (!regex.test(valor)) {
            input.value = valor.slice(0, 8);
        }
    }
</script>
<div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('padreGuardado'))
                <div class="alert alert-success">
                    {{ session('padreGuardado') }}
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
                    <h1><i class="fas fa-user"></i> Agregar Padre o encargado</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('savepadre') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-4">Nombre</label>
                                    <input placeholder="Ejemplo: Dorian Emilio" type="text" name="nombre" class="form-control col-md-9">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-4">Apellido</label>
                                    <input placeholder="Ejemplos: Torres Aguilar" type="text" name="apellido" class="form-control col-md-9">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="telefono" class="col-4">Teléfono:</label>
                                    <input placeholder="Ejemplo: 5467-3487" type="number" name="telefono" id="telefono" class="form-control col-md-9" oninput="validarTelefono(this)">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-2">Dirección</label>
                                    <input placeholder="Dirección o Colonia" type="text" name="direccion" class="form-control col-md-9">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alumno a cargo</label>
                                        <select name="alumno_id" class="form-control" >
                                            <option value="">  --Seleccione--  </option>
                                            @foreach( $alumnoids as $alumnoid)
                                                <option value="{{$alumnoid->id}}"> {{$alumnoid->nombre}} {{$alumnoid->apellido}}  </option>
                                            @endforeach
                                        </select>
                                    </div> 
                                </div>
                                <div class="col-md-6"> 
                                    <label></label>
                                    <div class="col-md-12 text-center mt-6">
                                        <button type="submit" class="btn btn-primary  btn-block mx-2 custom-btn-width">Guardar</button>
                                        <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/menupadre') }}">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
