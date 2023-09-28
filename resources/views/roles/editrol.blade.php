@extends('layouts.app')
@section('content')
<div class="container mt-5">
<div class="container mt-5">
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
                <div class="card">
                    <form action="{{ route('editrol', $editrol->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                        <div class="card-header text-center">Asignar Rol de usuario</div>
                            <div class="card-body">
                            <div class="row form-group">
                                <label form="" class="clo-2">Nombre de Usuario:</label>
                                <input type="text" name="name" class="form-control col-md-9" value="{{ $editrol->name }}">
                            </div>
                            <div class="row form-group">
                                <label form="" class="clo-2">Rol de Usario:</label>
                                <input type="text" name="role" class="form-control col-md-9" value=" {{ $editrol->rol }}">
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
