@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Cursos Registrados</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formcurso') }}">Nuevo Curso</a>
            @if(session('cursoEliminado'))
            <div class="alert alert-success">
                {{ session('cursoEliminado') }}
            </div>
            @endif
            <div class="row mb-3">
                <div class="col-md-6">
                    <form action="{{ route('searchCurso') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre del curso...">
                            <span class="input-group-btn">
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
                                <a href="{{ route('editcurso', $curso->id) }}" class="btn btn-primary mb-3 mr-3">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deletecurso', $curso->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del curso?');" class="btn btn-danger btn-block">
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
