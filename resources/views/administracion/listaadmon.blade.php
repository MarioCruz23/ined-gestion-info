@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-5">Actividades administrativas Registradas</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formadmon') }}">Nueva Actividad</a>
            <a href="{{ route('exportAdmonToExcel') }}" class="btn btn-primary">Exportar a Excel</a>
            @if(session('actividadadmonEliminado'))
            <div class="alert alert-success">
                {{ session('actividadadmonEliminado') }}
            </div>
            @endif
            <div class="row mb-3">
                <div class="col-md-6">
                    <form action="{{ route('searchAdmon') }}" method="GET">
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
                        <th>Código Actividad</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Encargado de revisón e impresión</th>
                        <th>Archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($admons as $admon)
                    <tr>
                        <td>{{ $admon->codigoadmon }}</td>
                        <td>{{ $admon->nombreact }}</td>
                        <td>{{ $admon->fecha }}</td>
                        <td>{{ $admon->descripcion }}</td>
                        <td>{{ $admon->docente->nombre }} {{ $admon->docente->apellido }}</td>
                        <td>
                            @if($admon->archivo)
                                <a href="{{ asset('uploads/' . $admon->archivo) }}" target="_blank">Ver archivo</a>
                            @else
                                <span>No hay archivo adjunto</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('editadmon', $admon->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deleteadmon', $admon->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos de las actividades administrativas?');" class="btn btn-danger btn-sm rounded-circle" style="margin-left: 5px;">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $admons->links() }}
        </div>
    </div>
</div>
@endsection
