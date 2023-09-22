@extends('layouts.app')
@section('content')
<div class="container mt-5">
<div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                @if(session('pensumModificado'))
                <div class="alert alert-success">
                    {{ session('pensumModificado') }}
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
                    <form action="{{ route('editpen', $editpensum->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-header text-center">Modificar Pensum</div>
                        <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre:</label>
                                <input type="text" name="nombre" class="form-control col-md-9" value="{{ $editpensum->nombre }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Archivo o imagen:</label>
                                @if($editpensum->archivopensum)
                                    <a href="{{ asset('uploads/' . $editpensum->archivopensum) }}" target="_blank">Ver archivo</a>
                                @else
                                    <span>No hay archivo adjunto</span>
                                @endif
                            </div>
                            </div>
                            <div class="row form-group">
                                <button type="submit" class="btn btn-success col-md-9 offset-2">Editar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection