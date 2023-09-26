@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Cursos Registrados</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formcurso') }}">Nuevo Curso</a>
            <!--@if(session('padreEliminado'))
            <div class="alert alert-success">
                {{ session('padreEliminado') }}
            </div>
            @endif -->
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Código Curso</th>
                        <th>Nombre</th>
                        <th>Área</th>
                        <th>Pensum</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->codigocurso }}</td>
                        <td>{{ $curso->nombre }}</td>
                        <td>{{ $curso->area }}</td>
                        <td>{{ $curso->pensum->nombre }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $cursos->links() }}
        </div>
    </div>
</div>
@endsection
