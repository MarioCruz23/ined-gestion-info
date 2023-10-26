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
        $('.delete-curso').click(function (event) {
            event.preventDefault();
            var button = $(this);
            var id = button.data('id');
            Swal.fire({
                title: '¿Seguro que desea borrar los datos de este curso?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/deletecurso/' + id, 
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.message === 'Curso eliminado exitosamente') { 
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
                                text: 'Se produjo un error al eliminar el curso.'
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
            <h2 class="text-center mb-5"><i class="fas fa-users"></i> <strong>Cursos Registrados</strong></h2>
            @if(session('cursoEliminado'))
            <div class="alert alert-success">
                {{ session('cursoEliminado') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-success mb-4" href="{{ url('/formcurso') }}">Nuevo Curso</a>
                    <a href="{{ route('exportToExcel') }}" class="btn btn-success mb-4">Exportar a Excel</a>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('searchCurso') }}" method="GET">
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
                                <a href="{{ route('editcurso', $curso->id) }}" class="btn btn-primary btn-sm rounded-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deletecurso', $curso->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm rounded-circle delete-curso" data-id="{{ $curso->id }}">
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
            {{ $cursos->links() }}
        </div>
    </div>
</div>
@endsection
