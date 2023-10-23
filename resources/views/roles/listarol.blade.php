@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10-center">
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Usuarios Registrados</strong></h2>
            @if(session('usuarioEliminado'))
            <div class="alert alert-success">
                {{ session('usuarioEliminado') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-success mb-4" href="{{ url('/menuasignaciones') }}">Menu Asignaciones</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchUser') }}" method="GET">
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
                                <a href="{{ route('editroles', $rol->id) }}" class="btn btn-primary rounded-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deleterol', $rol->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar el Usuario?');" class="btn btn-danger rounded-circle" style="margin-left: 5px;">
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
