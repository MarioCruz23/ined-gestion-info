@extends('layouts.app')
@section('content')

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
                <div class="card">
                    <form action="{{ route('savecurso') }}" method="POST">
                        @csrf
                        <div class="card-header text-center">Agregar Curso</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Código curso:</label>
                                <input type="text" name="codigocurso" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre:</label>
                                <input type="text" name="nombre" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Área:</label>
                                <input type="text" name="area" class="form-control col-md-9">
                            </div>
                            <div class="row mb-3">
                                <div class="col-6 offset-3">
                                    <div class="form-group">
                                        <label>Pensum:</label>
                                        <select name="pensum_id" class="form-control" >
                                            <option value="">--Seleccione--</option>
                                            @foreach( $pensumids as $pensumid)
                                                <option value="{{$pensumid->id}}"> {{$pensumid->nombre}} </option>
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
@endsection
