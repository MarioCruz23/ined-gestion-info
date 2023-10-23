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
</style>
<div class="container">
    <div class="row justify_content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Graduandos Registrados</strong></h2>
            @if(session('graduandoEliminado'))
            <div class="alert alert-success">
                {{ session('graduandoEliminado') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 text-right">
                <a class="btn btn-success mb-4" href="{{ url('/formgraduando') }}">Nuevo Graduando</a>
                <a href="{{ route('exportGraduandoToExcel') }}" class="btn btn-success mb-4">Exportar a Excel</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchGraduando') }}" method="GET">
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
                        <th>Código Estudiante</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Año de graduanción</th>
                        <th>Título</th>
                        <th>Constancia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($graduandos as $graduando)
                    <tr>
                        <td>{{ $graduando->codigoalu }}</td>
                        <td>{{ $graduando->nombre }}</td>
                        <td>{{ $graduando->apellido }}</td>
                        <td>{{ $graduando->anio }}</td>
                        <td>
                            @if($graduando->titulo)
                                <a href="{{ asset('uploads/' . $graduando->titulo) }}" target="_blank">Ver archivo</a>
                            @else
                                <span>No hay archivo adjunto</span>
                            @endif
                        </td>
                        <td>
                            @if($graduando->constancia)
                                <a href="{{ asset('uploads/' . $graduando->constancia) }}" target="_blank">Ver archivo</a>
                            @else
                                <span>No hay archivo adjunto</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                            <a href="{{ route('editgraduando', $graduando->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                                <form action="{{ route('deletegraduando', $graduando->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del graduando?');" class="btn btn-danger btn-sm rounded-circle">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $graduandos->links() }}
        </div>
    </div>
</div>
@endsection
