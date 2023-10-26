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
<div class="container mt-3">
    <div class="row justify-content-center"> 
        <div class="col-md-7 mt-5">
            <!-- Mensaje flash -->
            @if(session('asignacionGuardado'))
            <div class="alert alert-success">
                {{ session('asignacionGuardado') }}
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
                <h1><i class="fas fa-user"></i> Asignar curso a docente</h1>
            </div>
            <br>
            <div class="card mint-bg" style="max-width: 400px; margin: 0 auto;">
                <form action="{{ route('saveasignacion') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Docente:</label>
                            <select name="docente_id" class="form-control text-center">
                                <option value="">--Seleccione--</option>
                                @foreach($docenteids as $docenteid)
                                    <option value="{{$docenteid->id}}">{{$docenteid->nombre}} {{$docenteid->apellido}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Curso:</label>
                            <select name="curso_id" class="form-control text-center">
                                <option value="">--Seleccione--</option>
                                @foreach($cursoids as $cursoid)
                                    <option value="{{$cursoid->id}}">{{$cursoid->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="grado">Grado:</label>
                            <select name="grado" id="grado" class="form-control text-center">
                                <option selected>-- Seleccione el nivel --</option>
                                <option value="4to. Magisterio">4to. Magisterio</option>
                                <option value="5to. Magisterio">5to. Magisterio</option>
                                <option value="6to. Magisterio">6to. Magisterio</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-12 text-center mt-2">
                                <button type="submit" class="btn btn-primary btn-block custom-btn-width">Guardar</button>
                                <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/menuasignación') }}">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
