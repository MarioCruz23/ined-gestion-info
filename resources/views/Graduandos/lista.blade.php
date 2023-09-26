@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Graduandos Registrados</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formgraduando') }}">Nuevo Graduando</a>
            @if(session('graduandoEliminado'))
            <div class="alert alert-success">
                {{ session('graduandoEliminado') }}
            </div>
            @endif
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
                            <a href="{{ route('editgraduando', $graduando->id) }}" class="btn btn-primary mb-3 mr-3">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                                <form action="{{ route('deletegraduando', $graduando->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del graduando?');" class="btn btn-danger btn-block">
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
