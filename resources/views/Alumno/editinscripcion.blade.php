@extends('layouts.app')
@section('content')
<script>
    $(document).ready(function() {
    $('#codigoes').on('input', function() {
        var codigoes = $(this).val();
        console.log('Código del estudiante:', codigoes);
        $.ajax({
            url: '{{ route('getStudentName') }}',
            type: 'GET',
            data: {
                codigoes: codigoes,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    var nombreCompleto = response.data.nombre + ' ' + response.data.apellido;
                    $('#nombre').val(nombreCompleto);
                    $('#alumno_id').val(response.data.id);
                } else {
                    $('#nombre').val('Estudiante no encontrado');
                }
            }
        });
    });
});
</script>
<div class="container mt-5">
<div class="container mt-5">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('inscripcionModificado'))
                <div class="alert alert-success">
                    {{ session('inscripcionModificado') }}
                </div>
                @endif
                <!-- validación de errores-->
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card">
                    <form action="{{ route('editins', $editinscripcion->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <div class="row form-group">
                            <label for="codigoes" class="col-2">Código Estudiante:</label>
                            <input type="text" name="codigoes" id="codigoes" class="form-control col-md-9" value="{{ $editinscripcion->alumno->codigoes }}">
                        </div>
                        <input type="hidden" name="alumno_id" id="alumno_id" value="">
                        <div class="row form-group">
                            <label for="nombre" class="col-2">Nombre completo:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control col-md-9" readonly value="{{ $nombreCompleto }}">
                        </div>
                        <div class="row form-group">
                            <label for="nacionalidad" class="col-2">Nacionalidad:</label>
                            <input type="text" name="nacionalidad" class="form-control col-md-9" value="{{ $editinscripcion->nacionalidad }}">
                        </div>
                        <div class="row form-group">
                            <label for="grado" class="col-2">Nivel a cursar:</label>
                            <div class="col-md-9">
                                <select name="grado" id="grado" class="form-control">
                                    <option value="" selected>-- Seleccione el nivel --</option>
                                    <option value="4to. Magisterio" {{ $editinscripcion->grado == '4to. Magisterio' ? 'selected' : '' }}>4to. Magisterio</option>
                                    <option value="5to. Magisterio" {{ $editinscripcion->grado == '5to. Magisterio' ? 'selected' : '' }}>5to. Magisterio</option>
                                    <option value="6to. Magisterio" {{ $editinscripcion->grado == '6to. Magisterio' ? 'selected' : '' }}>6to. Magisterio</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label for="anio" class="col-2">Fecha de nacimiento</label>
                            <input type="date" name="anio" class="form-control col-md-9" value="{{ $editinscripcion->anio }}">
                        </div>
                        <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
