@extends('layouts.app')
@section('content')
<div class="container mt-5">
<div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('asignacionModificado'))
                <div class="alert alert-success">
                    {{ session('asignacionModificado') }}
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
                <div class="card">
                    <form action="{{ route('editasig', $editasignacion->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-header text-center">Modificar Padre o encargado</div>
                        <div class="card-body">
                        <div class="row mb-3">
                                <div class="col-6 offset-3">
                                    <div class="form-group">
                                        <label>Docente:</label>
                                        <select name="docente_id" class="form-control" >
                                            <option value="{{ $editasignacion->docente_id }}">{{ $editasignacion->docente->nombre }} {{ $editasignacion->docente->apellido }}</option>
                                            @foreach( $docentes as $docente)
                                                <option value="{{$docente->id}}"> {{$docente->nombre}} {{$docente->apellido}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                    <div class="form-group">
                                        <label>Curso:</label>
                                        <select name="curso_id" class="form-control" >
                                            <option value="{{ $editasignacion->curso_id }}">{{ $editasignacion->curso->nombre }} </option>
                                            @foreach( $cursos as $curso)
                                                <option value="{{$curso->id}}"> {{$curso->nombre}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                            <label for="grado" class="col-2">Grado:</label>
                            <div class="col-md-9">
                                <select name="grado" id="grado" class="form-control">
                                    <option value="" selected>-- Seleccione el nivel --</option>
                                    <option value="4to. Magisterio" {{ $editasignacion->grado == '4to. Magisterio' ? 'selected' : '' }}>4to. Magisterio</option>
                                    <option value="5to. Magisterio" {{ $editasignacion->grado == '5to. Magisterio' ? 'selected' : '' }}>5to. Magisterio</option>
                                    <option value="6to. Magisterio" {{ $editasignacion->grado == '6to. Magisterio' ? 'selected' : '' }}>6to. Magisterio</option>
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
