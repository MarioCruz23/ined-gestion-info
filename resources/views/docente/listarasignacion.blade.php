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
    .btn-info::before {
        content: "+";
        margin-right: 5px; 
        font-size: 18px;
    }
</style>
<script>
$(document).ready(function () {
    $('.delete-asignacion').click(function (event) {
        event.preventDefault();
        var button = $(this);
        var id = button.data('id');
        Swal.fire({
            title: '¿Seguro que desea borrar los datos de esta asignación de curso?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: '/deleteasignacion/' + id, 
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.message === 'Asignación de curso eliminada exitosamente') { 
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
                            text: 'Se produjo un error al eliminar la asignación de curso.'
                        });
                    }
                });
            }
        });
    });
});
</script>
<div class="container mt-3">
    <div class="row justify_content-center">
        <div class="col-md-12">
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Lista de cursos asignados a docentes</strong></h2>
            @if(session('asignacionEliminado'))
            <div class="alert alert-success">
                {{ session('asignacionEliminado') }}
            </div>
            @endif
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <form action="{{ route('exportAsignacionToExcel') }}" method="GET">
                        <div class="input-group">
                            <select name="grado" class="form-control text-center rounded-pill">
                                <option value="">--Seleccionar grado a exportar--</option>
                                <option value="4to. Magisterio">4to. Magisterio</option>
                                <option value="5to. Magisterio">5to. Magisterio</option>
                                <option value="6to. Magisterio">6to. Magisterio</option>
                            </select>
                            <span class="input-group-btn" style="margin-left: 5px;">
                                <button type="submit" class="btn btn-success">Exportar</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 text-center">
                    <a class="btn btn-info mb-3" href="{{ url('/formasignacion') }}">Nuevo</a>
                </div>
                <div class="col-md-5">
                <form action="{{ route('searchAsignacion') }}" method="GET">
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
                        <th>Docente</th>
                        <th>Curso</th>
                        <th>Grado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($asignacions as $asignacion)
                    <tr>
                        <td>{{ $asignacion->docente->nombre }} {{ $asignacion->docente->apellido }}</td>
                        <td>{{ $asignacion->curso->nombre }}</td>
                        <td>{{ $asignacion->grado }}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{ route('editasignacion', $asignacion->id) }}" class="btn btn-primary rounded-circle">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deleteasignacion', $asignacion->id) }}" method="POST" class="Alert-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-circle delete-asignacion" data-id="{{ $asignacion->id }}">
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
            {{ $asignacions->links() }}
        </div>
    </div>
</div>
@endsection
