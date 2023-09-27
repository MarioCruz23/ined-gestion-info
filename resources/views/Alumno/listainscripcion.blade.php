@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Estudiantes Inscritos</h2>
            <a class="btn btn-success mb-4" href="{{ url('/forminscripcion') }}">Nueva Inscripción</a>
            @if(session('inscripcionEliminado'))
            <div class="alert alert-success">
                {{ session('inscripcionEliminado') }}
            </div>
            @endif
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
                            <a href="{{ route('editinscripcion', $inscripcion->id) }}" class="btn btn-primary mb-3 mr-3">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deleteinscripcion', $inscripcion->id) }}" method="POST" class="Alert-eliminar">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del Estudiante inscrito?');" class="btn btn-danger btn-block">
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
