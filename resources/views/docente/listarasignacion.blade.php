@extends('layouts.app')
@section('content')
<style>
    .btn {
        margin-right: 5px;
    }
</style>
<div class="container mt-3">
    <div class="row justify_content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Lista de cursos asignados a docentes</strong></h2>
            @if(session('asignacionEliminado'))
            <div class="alert alert-success">
                {{ session('asignacionEliminado') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-success mb-4" href="{{ url('/formasignacion') }}">Nueva Asignación</a>
                    <a href="{{ route('exportAsignacionToExcel') }}" class="btn btn-success mb-4">Exportar a Excel</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchAsignacion') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Docente</th>
                        <th>Curso</th>
                        <th>Grado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($asignacions as $asignacion)
                    <tr>
                        <td>{{ $asignacion->docente->nombre }} {{ $asignacion->docente->apellido }}</td>
                        <td>{{ $asignacion->curso->nombre }}</td>
                        <td>{{ $asignacion->grado }}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{ route('editasignacion', $asignacion->id) }}" class="btn btn-primary mb-3 mr-3">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deleteasignacion', $asignacion->id) }}" method="POST" class="Alert-eliminar">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del curso asignado?');" class="btn btn-danger btn-block">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $asignacions->links() }}
        </div>
    </div>
</div>
@endsection
