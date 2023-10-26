@extends('layouts.app')
@section('content')
<style>
    .btn {
        margin-right: 5px;
    }
    table.table-sm {
        font-size: 11px;
    }
    table.table-sm th, table.table-sm td {
        padding: 0.3rem;
    }
    table.table-sm th {
        background-color: #f5f5f5;
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('.delete-graduando').click(function (event) {
            event.preventDefault();
            var button = $(this);
            var id = button.data('id');
            Swal.fire({
                title: '¿Seguro que desea borrar los datos de este graduando?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/deletegraduando/' + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.message === 'Graduando eliminado exitosamente') {
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
                                text: 'Se produjo un error al eliminar el graduando.'
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
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Graduandos Registrados</strong></h2>
            @if(session('graduandoEliminado'))
            <div class="alert alert-success">
                {{ session('graduandoEliminado') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 text-right">
                <a class="btn btn-success mb-4" href="{{ url('/formgraduando') }}">Nuevo Graduando</a>
                <a href="{{ route('exportGraduandoToExcel') }}" class="btn btn-success mb-4">Exportar a Excel</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchGraduando') }}" method="GET">
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
                        <th>Código Estudiante</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Año de graduanción</th>
                        <th>Título</th>
                        <th>Constancia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($graduandos as $graduando)
                    <tr>
                        <td>{{ $graduando->codigoalu }}</td>
                        <td>{{ $graduando->nombre }}</td>
                        <td>{{ $graduando->apellido }}</td>
                        <td>{{ $graduando->anio }}</td>
                        <td>
                            @if($graduando->titulo)
                                <a href="{{ asset('uploads/' . $graduando->titulo) }}" target="_blank">Ver archivo</a>
                            @else
                                <span>No hay archivo adjunto</span>
                            @endif
                        </td>
                        <td>
                            @if($graduando->constancia)
                                <a href="{{ asset('uploads/' . $graduando->constancia) }}" target="_blank">Ver archivo</a>
                            @else
                                <span>No hay archivo adjunto</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                            <a href="{{ route('editgraduando', $graduando->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('deletegraduando', $graduando->id) }}" method="POST" class="Alert-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-circle delete-graduando" data-id="{{ $graduando->id }}">
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
            {{ $graduandos->links() }}
        </div>
    </div>
</div>
@endsection
