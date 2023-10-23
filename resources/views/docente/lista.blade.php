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
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Docentes matriculados</strong></h2>
            @if(session('docenteEliminado'))
            <div class="alert alert-success">
                {{ session('docenteEliminado') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-success mb-4" href="{{ url('/formdocente') }}">Nuevo Docente</a>
                    <a href="{{ route('exportDocenteToExcel') }}" class="btn btn-success mb-4">Exportar a Excel</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchDocente') }}" method="GET">
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
                        <th>Edad</th>
                        <th>Fecha nacimiento</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>Género</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($docentes as $docente)
                    <tr>
                        <td>{{ $docente->nombre }}</td>
                        <td>{{ $docente->apellido }}</td>
                        <td>{{ $docente->edad }}</td>
                        <td>{{ $docente->fechanac }}</td>
                        <td>{{ $docente->telefono }}</td>
                        <td>{{ $docente->direccion }}</td>
                        <td>{{ $docente->correo }}</td>
                        <td>{{ $docente->genero }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('editdocente', $docente->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('delete', $docente->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos de este docente?');" class="btn btn-danger btn-sm rounded-circle">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $docentes->links() }}
        </div>
    </div>
</div>
@endsection
