@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Pensum Registradas</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formpensum') }}">Nuevo Pensum</a>
            @if(session('pensumEliminado'))
            <div class="alert alert-success">
                {{ session('pensumEliminado') }}
            </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Archivo/Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pensums as $pensum)
                    <tr>
                        <td>{{ $pensum->nombre }}</td>
                        <td>
                            @if($pensum->archivopensum)
                                <a href="{{ asset('uploads/' . $pensum->archivopensum) }}" target="_blank">Ver archivo</a>
                            @else
                                <span>No hay archivo adjunto</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('editpensum', $pensum->id) }}" class="btn btn-primary mb-3 mr-3">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deletepensum', $pensum->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos de las actividades administrativas?');" class="btn btn-danger btn-block">
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
    </div>
</div>
@endsection