@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Usuarios Registrados</h2>
            <a class="btn btn-success mb-4" href="">Menu Principal</a>
            @if(session('usuarioEliminado'))
            <div class="alert alert-success">
                {{ session('usuarioEliminado') }}
            </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nombre Usuario</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($rols as $rol)
                    <tr>
                        <td>{{ $rol->name }}</td>
                        <td>{{ $rol->email }}</td>
                        <td>{{ $rol->role }}</td>
                        <td>
                            <div class="btn-group">
                            <a href="{{ route('editroles', $rol->id) }}" class="btn btn-primary mb-3 mr-3">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deleterol', $rol->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar el Usuario?');" class="btn btn-danger btn-block">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $rols->links() }}
        </div>
    </div>
</div>
@endsection
