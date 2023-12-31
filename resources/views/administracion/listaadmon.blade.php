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
    .custom-btn-sm {
        width: 28px;
        height: 28px; 
        font-size: 13px;
        padding: 0;
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
    .btn-success::after {
        content: " \1F4C3"; 
        margin-left: 5px; 
        font-size: 16px;
    }
</style>
<script>
    $(document).ready(function () {
        $('.delete-docente').click(function (event) {
            event.preventDefault();
            var button = $(this);
            var id = button.data('id');
            Swal.fire({
                title: '¿Seguro que desea borrar los datos de este docente?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/deleteadmon/' + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.message === 'Actividad administrativa eliminada exitosamente') {
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
                                text: 'Se produjo un error al eliminar el docente.'
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
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Actividades administrativas Registradas</strong></h2>
            @if(session('actividadadmonEliminado'))
            <div class="alert alert-success">
                {{ session('actividadadmonEliminado') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-info mb-4" href="{{ url('/formadmon') }}">Nuevo</a>
                    <a href="{{ route('exportAdmonToExcel') }}" class="btn btn-success mb-4">Exportar</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchAdmon') }}" method="GET">
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
                        <th>Código Actividad</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Encargado de revisón e impresión</th>
                        <th>Archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($admons as $admon)
                    <tr>
                        <td>{{ $admon->codigoadmon }}</td>
                        <td>{{ $admon->nombreact }}</td>
                        <td>{{ $admon->fecha }}</td>
                        <td>{{ $admon->descripcion }}</td>
                        <td>{{ $admon->docente->nombre }} {{ $admon->docente->apellido }}</td>
                        <td>
                            @if($admon->archivo)
                                <a href="{{ asset('uploads/' . $admon->archivo) }}" target="_blank">Ver archivo</a>
                            @else
                                <span>No hay archivo adjunto</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('editadmon', $admon->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deleteadmon', $admon->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-circle delete-docente" data-id="{{ $admon->id }}">
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
            {{ $admons->links() }}
        </div>
    </div>
</div>
@endsection
