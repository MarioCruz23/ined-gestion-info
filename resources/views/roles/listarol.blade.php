@extends('layouts.app')
@section('content')
<style>
    .btn {
        margin-right: 5px;
    }
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        list-style: none;
    }
    .pagination li {
        margin: 0 5px;
    }
    .pagination .page-item.disabled .page-link {
        background-color: #ddd;
        color: #555;
        cursor: not-allowed;
    }
    .pagination .page-item a.page-link {
        background-color: #007BFF;
        color: #fff;
        border: 1px solid #007BFF;
        border-radius: 50%;
        padding: 5px 10px;
        text-decoration: none;
    }
    .pagination .page-item a.page-link:hover {
        background-color: #0056b3;
    }
</style>
<script>
$(document).ready(function () {
    $('.delete-rol').click(function (event) {
        event.preventDefault();
        var button = $(this);
        var id = button.data('id');
        Swal.fire({
            title: '¿Seguro que desea borrar este usuario?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: '/deleterol/' + id,
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.message === 'Usuario eliminado exitosamente') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: data.message,
                            });
                            button.closest('tr').remove();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                            });
                        }
                    },
                    error: function (data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Se produjo un error al eliminar el usuario.'
                        });
                    }
                });
            }
        });
    });
});
</script>
<div class="container">
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
            <br>
            <div class="table-responsive">
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
                                <a href="{{ route('editroles', $rol->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deleterol', $rol->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-circle delete-rol" data-id="{{ $rol->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            {{ $rols->links() }}
        </div>
    </div>
</div>
@endsection
