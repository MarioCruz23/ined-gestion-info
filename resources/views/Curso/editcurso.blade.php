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
<div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('cursoModificado'))
                <div class="alert alert-success">
                    {{ session('cursoModificado') }}
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
                    <h1><i class="fas fa-user"></i> Formulario de Edición de Curso</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('editcur', $editcurso->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label form="" class="clo-2">Código curso:</label>
                                        <input type="text" name="codigocurso" class="form-control col-md-9" value="{{ $editcurso->codigocurso }}">
                                    </div>
                                    <div class="col-md-6"> 
                                        <label form="" class="clo-2">Nombre:</label>
                                        <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editcurso->nombre }}">
                                    </div>
                                </div>
                                <br>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label form="" class="clo-2">Área:</label>
                                        <input type="text" name="area" class="form-control col-md-9" value="{{ $editcurso->area }}">
                                    </div>
                                    <div class="col-md-6"> 
                                        <label>Pensum:</label>
                                        <select name="pensum_id" class="form-control" >
                                            <option value="{{ $editcurso->pensum_id }}">{{ $editcurso->pensum->nombre }}</option>
                                            @foreach( $pensums as $pensum)
                                                <option value="{{$pensum->id}}"> {{$pensum->nombre}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary  btn-block custom-btn-width">Guardar</button>
                                    </div>
                                    <div class="col-md-6"> 
                                        <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/listarcurso') }}">Cancelar</a>
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
