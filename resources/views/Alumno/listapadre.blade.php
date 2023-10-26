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
        $('.delete-padre').click(function (event) {
            event.preventDefault();
            var button = $(this);
            var id = button.data('id');
            Swal.fire({
                title: '¿Seguro que desea borrar los datos de este padre o encargado del alumno?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/deletepadre/' + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.message === 'Padre o Encargado eliminado exitosamente') {
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
                                text: 'Se produjo un error al eliminar el padre o encargado.'
                            });
                        }
                    });
                }
            });
        });
    });
</script>
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-5">Padres o Encargados Registrados</h2>
            @if(session('padreEliminado'))
            <div class="alert alert-success">
                {{ session('padreEliminado') }}
            </div>
            @endif 
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-success mb-4" href="{{ url('/formpadre') }}">Nuevo</a>
                    <a href="{{ route('exportPadreToExcel') }}" class="btn btn-success mb-4">Exportar a Excel</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchPadre') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control rounded-pill" placeholder="Buscar...">
                            <span class="input-group-btn" style="margin-left: 5px;">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Alumno a cargo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($padre_encargados as $padre_encargado)
                    <tr>
                        <td>{{ $padre_encargado->nombre }}</td>
                        <td>{{ $padre_encargado->apellido }}</td>
                        <td>{{ $padre_encargado->telefono }}</td>
                        <td>{{ $padre_encargado->direccion }}</td>
                        <td>{{ $padre_encargado->alumno->nombre }} {{ $padre_encargado->alumno->apellido }}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{ route('editpadre', $padre_encargado->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deletepadre', $padre_encargado->id) }}" method="POST" class="Alert-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-circle delete-padre" data-id="{{ $padre_encargado->id }}">
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
            {{ $padre_encargados->links() }}
        </div>
    </div>
</div>
@endsection
