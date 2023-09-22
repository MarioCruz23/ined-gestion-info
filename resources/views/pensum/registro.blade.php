@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('pensumGuardado'))
                <div class="alert alert-success">
                    {{ session('pensumGuardado') }}
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
                    <form action="{{ route('savepensum') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center">Agregar Pensum</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre</label>
                                <input type="text" name="nombre" class="form-control col-md-9">
                            </div>
                            <div class="row form-group">
                                <label for="" class="col-2">Imagen o Archivo</label>
                                <input class="form-control" type="file" name="archivopensum">
                            </div>
                            @if(isset($pensumdata['archivopensum']))
                                <div class="row form-group">
                                    <label class="col-2">Nombre del archivo:</label>
                                    <span>{{ basename($pensumdata['archivopensum']) }}</span>
                                </div>
                            @endif
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
