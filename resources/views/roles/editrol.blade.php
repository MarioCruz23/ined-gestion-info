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
<div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                @if(session('usuarioModificado'))
                <div class="alert alert-success">
                    {{ session('usuarioModificado') }}
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
                    <h1><i class="fas fa-user"></i>Asignación Rol de usuario</h1>
                </div>
                <br>
                <div class="card mint-bg" style="max-width: 400px; margin: 0 auto;">
                    <form action="{{ route('editrol', $editrol->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label form="" class="clo-2">Nombre de Usuario:</label>
                                <input type="text" name="name" class="form-control col-md-9" value="{{ $editrol->name }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label form="" class="clo-2">Rol de Usario:</label>
                                <input type="text" name="role" class="form-control col-md-9" value=" {{ $editrol->rol }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-12 text-center mt-2">
                                    <button type="submit" class="btn btn-primary btn-block custom-btn-width">Editar</button>
                                    <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/listarol') }}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
