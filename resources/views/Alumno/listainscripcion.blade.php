@extends('layouts.app')
@section('content')
<style>
    .btn {
        margin-right: 5px;
    }
</style>
<div class="container">
    <div class="row justify_content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Estudiantes Inscritos</strong></h2>
            @if(session('inscripcionEliminado'))
            <div class="alert alert-success">
                {{ session('inscripcionEliminado') }}
            </div>
            @endif
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <form action="{{ route('exportInscripcionToExcel') }}" method="POST" class="form-inline d-flex align-items-center">
                        @csrf
                        <select name="grado" class="form-control text-center">
                            <option value="" selected>-- Seleccione Grado --</option>
                            <option value="4to. Magisterio">4to. Magisterio</option>
                            <option value="5to. Magisterio">5to. Magisterio</option>
                            <option value="6to. Magisterio">6to. Magisterio</option>
                        </select>
                        <button type="submit" class="btn btn-success ml-1" style="margin-left: 5px;">Exportar</button>
                    </form>
                </div>
                <div class="col-md-2 text-center">
                    <a class="btn btn-secondary mb-3" href="{{ url('/forminscripcion') }}">Nueva Inscripción</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchInscripcion') }}" method="GET">
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
                        <th>Codigo</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Fecha inscripción</th>
                        <th>Nacionalidad</th>
                        <th>Grado</th>
                        <th>Cui</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($inscripcions as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->alumno->codigoes }}</td>
                        <td>{{ $inscripcion->alumno->apellido }}</td>
                        <td>{{ $inscripcion->alumno->nombre }}</td>
                        <td>{{ $inscripcion->anio }}</td>
                        <td>{{ $inscripcion->nacionalidad }}</td>
                        <td>{{ $inscripcion->grado }}</td>
                        <td>{{ $inscripcion->alumno->cui }}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{ route('editinscripcion', $inscripcion->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deleteinscripcion', $inscripcion->id) }}" method="POST" class="Alert-eliminar">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del Estudiante inscrito?');" class="btn btn-danger btn-sm rounded-circle">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $inscripcions->links() }}
        </div>
    </div>
</div>
@endsection
