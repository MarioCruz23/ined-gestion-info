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
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <form action="{{ route('exportAsignacionToExcel') }}" method="GET">
                        <div class="input-group">
                            <select name="grado" class="form-control text-center rounded-pill">
                                <option value="">--Seleccionar grado a exportar--</option>
                                <option value="4to. Magisterio">4to. Magisterio</option>
                                <option value="5to. Magisterio">5to. Magisterio</option>
                                <option value="6to. Magisterio">6to. Magisterio</option>
                            </select>
                            <span class="input-group-btn" style="margin-left: 5px;">
                                <button type="submit" class="btn btn-success">Exportar</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 text-center">
                    <a class="btn btn-success mb-3" href="{{ url('/formasignacion') }}">Nueva Asignación</a>
                </div>
                <div class="col-md-6">
                <form action="{{ route('searchAsignacion') }}" method="GET">
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
                            <a href="{{ route('editasignacion', $asignacion->id) }}" class="btn btn-primary rounded-circle">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deleteasignacion', $asignacion->id) }}" method="POST" class="Alert-eliminar">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del curso asignado?');" class="btn btn-danger rounded-circle">
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
