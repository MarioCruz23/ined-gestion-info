@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Estudiantes Inscritos</h2>
            <a class="btn btn-success mb-4" href="{{ url('/forminscripcion') }}">Nuevo</a>
            <!--@if(session('padreEliminado'))
            <div class="alert alert-success">
                {{ session('padreEliminado') }}
            </div>
            @endif -->
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Fecha inscripción</th>
                        <th>Nacionalidad</th>
                        <th>Grado</th>
                        <th>Cui</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($inscripcions as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->alumno->codigoes }}</td>
                        <td>{{ $inscripcion->alumno->apellido }}</td>
                        <td>{{ $inscripcion->alumno->nombre }}</td>
                        <td>{{ $inscripcion->anio }}</td>
                        <td>{{ $inscripcion->nacionalidad }}</td>
                        <td>{{ $inscripcion->grado }}</td>
                        <td>{{ $inscripcion->alumno->cui }}</td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $inscripcions->links() }}
        </div>
    </div>
</div>
@endsection
