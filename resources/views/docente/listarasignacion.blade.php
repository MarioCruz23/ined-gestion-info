@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Lista de cursos asignados a docentes</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formasignacion') }}">Nueva Asignación</a>
            @if(session('asignacionEliminado'))
            <div class="alert alert-success">
                {{ session('asignacionEliminado') }}
            </div>
            @endif
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
                        <td>{{ $asignacion->docente->nombre }}</td>
                        <td>{{ $asignacion->curso->nombre }}</td>
                        <td>{{ $asignacion->grado }}</td>
                        <td>
                        <div class="btn-group">
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
