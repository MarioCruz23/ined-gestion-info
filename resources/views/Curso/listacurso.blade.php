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
