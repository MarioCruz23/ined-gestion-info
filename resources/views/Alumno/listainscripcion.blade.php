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
        $('.delete-inscripcion').click(function (event) {
            event.preventDefault();
            var button = $(this);
            var id = button.data('id');
            Swal.fire({
                title: '¿Seguro que desea borrar los datos de este estudiante inscrito?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/deleteinscripcion/' + id,  // Ajusta la URL de la eliminación
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.message === 'Estudiante inscrito eliminado exitosamente') {
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
                                text: 'Se produjo un error al eliminar el estudiante inscrito.'
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
        <div class="col-md-12">
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Estudiantes Inscritos</strong></h2>
            @if(session('inscripcionEliminado'))
            <div class="alert alert-success">
                {{ session('inscripcionEliminado') }}
            </div>
            @endif
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <form action="{{ route('exportInscripcionToExcel') }}" method="POST" class="form-inline d-flex align-items-center">
                        @csrf
                        <select name="grado" class="form-control text-center rounded-pill">
                            <option value="" selected>-- Seleccione Grado --</option>
                            <option value="4to. Magisterio">4to. Magisterio</option>
                            <option value="5to. Magisterio">5to. Magisterio</option>
                            <option value="6to. Magisterio">6to. Magisterio</option>
                        </select>
                        <button type="submit" class="btn btn-success ml-1" style="margin-left: 5px;">Exportar</button>
                    </form>
                </div>
                <div class="col-md-2 text-center">
                    <a class="btn btn-secondary mb-3" href="{{ url('/forminscripcion') }}">Nueva Inscripción</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchInscripcion') }}" method="GET">
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
                        <th>Codigo</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Fecha inscripción</th>
                        <th>Nacionalidad</th>
                        <th>Grado</th>
                        <th>Cui</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($inscripcions as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->alumno->codigoes }}</td>
                        <td>{{ $inscripcion->alumno->apellido }}</td>
                        <td>{{ $inscripcion->alumno->nombre }}</td>
                        <td>{{ $inscripcion->anio }}</td>
                        <td>{{ $inscripcion->nacionalidad }}</td>
                        <td>{{ $inscripcion->grado }}</td>
                        <td>{{ $inscripcion->alumno->cui }}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{ route('editinscripcion', $inscripcion->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deleteinscripcion', $inscripcion->id) }}" method="POST" class="Alert-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-circle delete-inscripcion" data-id="{{ $inscripcion->id }}">
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
            {{ $inscripcions->links() }}
        </div>
    </div>
</div>
@endsection
