@extends('layouts.app')
@section('content')
<style>
    .mint-bg {
        background-color: #FFB6C1;
        padding: 20px;
        border: 1px solid black;
    }
    .mint-bg label {
        font-weight: bold; 
    }
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        appearance: none;
        margin: 0;
    }
    .custom-btn-width {
    width: 46%;
    }
    .title-container {
        text-align: center;
    }
    .title-container h1 {
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .title-container i {
        font-size: 36px;
        margin-right: 10px;
    }
</style>
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
<script>
    $(document).ready(function () {
        $('form').submit(function (event) {
            event.preventDefault();
            var form = $(this);

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.message === 'Estudiante inscrito exitosamente') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: data.message,
                        });
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
                        text: 'Se produjo un error al inscribir al estudiante.'
                    });
                }
            });
        });
    });
</script>
<div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- Mensaje flash -->
                @if(session('inscripcionGuardado'))
                <div class="alert alert-success">
                    {{ session('inscripcionGuardado') }}
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
                <div class="title-container text-center">
                    <h1><i class="fas fa-user"></i> Formulario para inscribir Estudiante</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('saveinscripcion') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="codigoes" class="col-6">Código Estudiante:</label>
                                <input type="text" name="codigoes" id="codigoes" class="form-control col-md-9">
                            </div>
                            <input type="hidden" name="alumno_id" id="alumno_id" value="">
                            <div class="col-md-6"> 
                                <label for="nombre" class="col-6">Nombre completo:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control col-md-9" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="nacionalidad" class="col-6">Nacionalidad:</label>
                                <input type="text" name="nacionalidad" class="form-control col-md-9">
                            </div>
                            <div class="col-md-6"> 
                                <label for="anio" class="col-6">Fecha de inscripción:</label>
                                <input type="date" name="anio" class="form-control col-md-9">
                            </div>
                        </div>
                        <br>
                        <div class="row form-group align-items-center">
                            <div class="col-md-6">
                                <label for="grado" class="col-6">Nivel a cursar:</label>
                                <div class="col-md-12">
                                    <select name="grado" id="grado" class="form-control text-center">
                                        <option selected>-- Seleccione el nivel --</option>
                                        <option value="4to. Magisterio">4to. Magisterio</option>
                                        <option value="5to. Magisterio">5to. Magisterio</option>
                                        <option value="6to. Magisterio">6to. Magisterio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="col-md-12 text-center mt-4">
                                    <label></label>
                                    <button type="submit" class="btn btn-primary btn-block custom-btn-width">Guardar</button>
                                    <a class="btn btn-danger btn-block custom-btn-width" href="{{ url('/menuinscripcion') }}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
