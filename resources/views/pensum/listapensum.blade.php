@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Pensum Registradas</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formpensum') }}">Nuevo Pensum</a>
            <!-- @if(session('actividadadmonEliminado'))
            <div class="alert alert-success">
                {{ session('actividadadmonEliminado') }}
            </div>
            @endif -->
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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection