@extends('layouts.app')
@section('content')
<style>
    .btn {
        margin-right: 5px;
    }
</style>
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-5">Padres o Encargados Registrados</h2>
            @if(session('padreEliminado'))
            <div class="alert alert-success">
                {{ session('padreEliminado') }}
            </div>
            @endif 
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-success mb-4" href="{{ url('/formpadre') }}">Nuevo</a>
                    <a href="{{ route('exportPadreToExcel') }}" class="btn btn-success mb-4">Exportar a Excel</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchPadre') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control rounded-pill" placeholder="Buscar...">
                            <span class="input-group-btn" style="margin-left: 5px;">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Alumno a cargo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($padre_encargados as $padre_encargado)
                    <tr>
                        <td>{{ $padre_encargado->nombre }}</td>
                        <td>{{ $padre_encargado->apellido }}</td>
                        <td>{{ $padre_encargado->telefono }}</td>
                        <td>{{ $padre_encargado->direccion }}</td>
                        <td>{{ $padre_encargado->alumno->nombre }} {{ $padre_encargado->alumno->apellido }}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{ route('editpadre', $padre_encargado->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deletepadre', $padre_encargado->id) }}" method="POST" class="Alert-eliminar">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del padre o encargado del alumno?');" class="btn btn-danger btn-sm rounded-circle">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $padre_encargados->links() }}
        </div>
    </div>
</div>
@endsection
