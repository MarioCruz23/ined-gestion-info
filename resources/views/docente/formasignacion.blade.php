@extends('layouts.app')
@section('content')
<div class="container mt-5">
<div class="container mt-5">
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
                <div class="card">
                    <form action="{{ route('saveasignacion') }}" method="POST">
                        @csrf
                        <div class="card-header text-center">Asignar curso a docente</div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                <div class="form-group">
                                    <label>Docente:</label>
                                    <select name="docente_id" class="form-control">
                                        <option value="">--Seleccione--</option>
                                        @foreach($docenteids as $docenteid)
                                            <option value="{{$docenteid->id}}">{{$docenteid->nombre}} {{$docenteid->apellido}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                <div class="form-group">
                                    <label>Curso:</label>
                                    <select name="curso_id" class="form-control">
                                        <option value="">--Seleccione--</option>
                                        @foreach($cursoids as $cursoid)
                                            <option value="{{$cursoid->id}}">{{$cursoid->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="row form-group">
                            <label for="grado" class="col-2">Grado:</label>
                            <div class="col-md-9">
                                <select name="grado" id="grado" class="form-control">
                                    <option selected>-- Seleccione el nivel --</option>
                                    <option value="4to. Magisterio">4to. Magisterio</option>
                                    <option value="5to. Magisterio">5to. Magisterio</option>
                                    <option value="6to. Magisterio">6to. Magisterio</option>
                                </select>
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
