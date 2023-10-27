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
        $('.delete-pensum').click(function (event) {
            event.preventDefault();
            var button = $(this);
            var id = button.data('id');
            Swal.fire({
                title: '¿Seguro que desea borrar los datos de este pensum?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/deletepensum/' + id, 
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.message === 'Pensum eliminado exitosamente') {
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
                                text: 'Se produjo un error al eliminar el pensum.'
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
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Pensum Registrados</strong></h2>    
            @if(session('pensumEliminado'))
            <div class="alert alert-success">
                {{ session('pensumEliminado') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-info mb-4" href="{{ url('/formpensum') }}">Nuevo Pensum</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchPensum') }}" method="GET">
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
                        <th>Archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pensums as $pensum)
                    <tr>
                        <td>{{ $pensum->nombre }}</td>
                        <td>
                            @if($pensum->archivopensum)
                                <a href="{{ asset('uploads/' . $pensum->archivopensum) }}" target="_blank">Ver archivo</a>
                            @else
                                <span>No hay archivo adjunto</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('editpensum', $pensum->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deletepensum', $pensum->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-circle delete-pensum" data-id="{{ $pensum->id }}">
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
            {{ $pensums->links() }}
        </div>
    </div>
</div>
@endsection
