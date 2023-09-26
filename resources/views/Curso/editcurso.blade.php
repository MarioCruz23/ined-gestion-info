@extends('layouts.app')
@section('content')
<div class="container mt-5">
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
                <div class="card">
                    <form action="{{ route('editcur', $editcurso->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-header text-center">Modificar Curso</div>
                            <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Código curso:</label>
                                <input type="text" name="codigocurso" class="form-control col-md-9" value="{{ $editcurso->codigocurso }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre:</label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editcurso->nombre }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Área:</label>
                                <input type="text" name="area" class="form-control col-md-9" value="{{ $editcurso->area }}">
                            </div>
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                    <div class="form-group">
                                        <label>Pensum:</label>
                                        <select name="pensum_id" class="form-control" >
                                            <option value="{{ $editcurso->pensum_id }}">{{ $editcurso->pensum->nombre }}</option>
                                            @foreach( $pensums as $pensum)
                                                <option value="{{$pensum->id}}"> {{$pensum->nombre}} </option>
                                            @endforeach
                                        </select>
                                    </div>
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
