@extends('layouts.app')
@section('content')
<style>
    .btn {
        margin-right: 5px;
    }
</style>
<div class="container">
    <div class="row justify_content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Cursos Registrados</strong></h2>
            @if(session('cursoEliminado'))
            <div class="alert alert-success">
                {{ session('cursoEliminado') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-success mb-4" href="{{ url('/formcurso') }}">Nuevo Curso</a>
                    <a href="{{ route('exportToExcel') }}" class="btn btn-success mb-4">Exportar a Excel</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchCurso') }}" method="GET">
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
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('editcurso', $curso->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deletecurso', $curso->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del curso?');" class="btn btn-danger btn-sm rounded-circle" style="margin-left: 5px;">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $cursos->links() }}
        </div>
    </div>
</div>
@endsection
