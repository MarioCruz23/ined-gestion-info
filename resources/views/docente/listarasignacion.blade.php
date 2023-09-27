@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Lista de cursos asignados a docentes</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formasignacion') }}">Nueva Asignación</a>
            <!--@if(session('padreEliminado'))
            <div class="alert alert-success">
                {{ session('padreEliminado') }}
            </div>
            @endif -->
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Docente</th>
                        <th>Curso</th>
                        <th>Grado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($asignacions as $asignacion)
                    <tr>
                        <td>{{ $asignacion->docente->nombre }}</td>
                        <td>{{ $asignacion->curso->nombre }}</td>
                        <td>{{ $asignacion->grado }}</td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $asignacions->links() }}
        </div>
    </div>
</div>
@endsection
