@extends('layouts.app')
@section('content')
<style>
    .btn {
        margin-right: 5px;
    }
    table.table-sm {
        font-size: 11px;
    }
    table.table-sm th, table.table-sm td {
        padding: 0.3rem;
    }
    table.table-sm th {
        background-color: #f5f5f5;
    }
    .custom-btn-sm {
        width: 24px;
        height: 24px; 
        font-size: 12px;
        padding: 0;
    }
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
    }

    .pagination li {
        margin: 0 5px;
    }

    .pagination .page-item.disabled .page-link {
        background-color: #ddd;
        color: #555;
        cursor: not-allowed;
    }

    .pagination .page-item a.page-link {
        background-color: #007BFF;
        color: #fff;
        border: 1px solid #007BFF;
        border-radius: 50%;
        padding: 5px 10px;
        text-decoration: none;
    }

    .pagination .page-item a.page-link:hover {
        background-color: #0056b3;
    }
</style>
<div class="container">
    <div class="row justify_content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Estudiantes Registrados</strong></h2>
            @if(session('alumnoEliminado'))
            <div class="alert alert-success">
                {{ session('alumnoEliminado') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-success mb-4" href="{{ url('/formalumno') }}">Nuevo Alumno</a>
                    <a href="{{ route('exportAlumnoToExcel') }}" class="btn btn-success mb-4">Exportar a Excel</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchAlumno') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control rounded-pill" placeholder="Buscar...">
                            <span class="input-group-btn" style="margin-left: 5px;">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Código Estudiante</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>Fecha nacimiento</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>CUI</th>
                        <th>Género</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->codigoes }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellido }}</td>
                        <td>{{ $alumno->edad }}</td>
                        <td>{{ $alumno->fechanac }}</td>
                        <td>{{ $alumno->telefono }}</td>
                        <td>{{ $alumno->direccion }}</td>
                        <td>{{ $alumno->correo }}</td>
                        <td>{{ $alumno->cui }}</td>
                        <td>{{ $alumno->genero }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('editalumno', $alumno->id) }}" class="btn btn-primary btn-sm rounded-circle custom-btn-sm">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deletealumno', $alumno->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del alumno?');" class="btn btn-danger btn-sm rounded-circle custom-btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            {{ $alumnos->links() }}
        </div>
    </div>
</div>
@endsection
