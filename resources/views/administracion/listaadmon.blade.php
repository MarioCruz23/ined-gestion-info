@extends('layouts.app')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Actividades administrativas Registradas</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formadmon') }}">Nueva Actividad</a>
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
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $admons->links() }}
        </div>
    </div>
</div>