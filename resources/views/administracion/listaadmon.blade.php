@extends('layouts.app')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Actividades administrativas Registradas</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formadmon') }}">Nueva Actividad</a>
            @if(session('actividadadmonEliminado'))
            <div class="alert alert-success">
                {{ session('actividadadmonEliminado') }}
            </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Código Actividad</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
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
                        <td>{{ $admon->archivo }}</td>
                        <td>
                        <form action="{{ route('deleteadmon', $admon->id) }}" method="POST" class="Alert-eliminar">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos de las actividades administrativas?');" class="btn btn-danger btn-block">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $admons->links() }}
        </div>
    </div>
</div>