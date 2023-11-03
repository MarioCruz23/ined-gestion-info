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
    function calcularEdad() {
        const fechaNacimiento = new Date(document.querySelector('input[name="fechanac"]').value);
        const fechaActual = new Date();
        const diferencia = fechaActual - fechaNacimiento;
        const edad = Math.floor(diferencia / (1000 * 60 * 60 * 24 * 365.25));
        document.querySelector('input[name="edad"]').value = edad;
    }
    function validarTelefono(input) {
        const valor = input.value.trim();
        const regex = /^[0-9]{1,8}$/;
        if (!regex.test(valor)) {
            input.value = valor.slice(0, 8);
        }
    }
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
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: data.message,
                    });
                },
                error: function (data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Se produjo un error al guardar al alumno.'
                    });
                }
            });
        });
    });
</script>
<div class="container">
        <div class="row justify-content-center"> 
            <div class="col-md-7 mt-5">
                <!-- validación de errores -->
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
                    <h1><i class="fas fa-user"></i> Formulario de Registro Estudiante</h1>
                </div>
                <br>
                <div class="card mint-bg">
                    <form action="{{ route('savealumno') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="codigoes" class="col-6">Código Estudiante:</label>
                                    <input placeholder="ejemplo: A45T87U34" type="text" name="codigoes" id="codigoes" class="form-control col-md-9" maxlength="7" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '').substring(0, 7);">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-2">Nombre: </label>
                                    <input placeholder="Ejemplo: Dorian Emilio" type="text" name="nombre" class="form-control col-md-9">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-2">Apellido: </label>
                                    <input placeholder="Ejemplo: Carrasco Torres" type="text" name="apellido" class="form-control col-md-9">
                                </div>
                                <div class="col-md-6"> 
                                    <label for="telefono" class="col-4">Teléfono:</label>
                                    <input placeholder="ejemplo: 54967895" type="number" name="telefono" id="telefono" class="form-control col-md-9" oninput="validarTelefono(this)">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6"> 
                                    <label for="fechanac" class="clo-2">Fecha de nacimiento</label>
                                    <input type="date" name="fechanac" class="form-control col-md-9" min="1985-01-01" max="2008-12-31" onchange="calcularEdad()">
                                </div>
                                <div class="col-md-6"> 
                                    <label for="edad" class="clo-2">Edad:</label>
                                    <input placeholder="ejemplo: 22" type="number" name="edad" id="edad" class="form-control col-md-9">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-2">Dirección: </label>
                                    <input placeholder="Dirección exacta o colonia" type="text" name="direccion" class="form-control col-md-9">
                                </div>
                                <div class="col-md-6"> 
                                    <label form="" class="clo-2">Correo: </label>
                                    <input placeholder="nombre@ejemplo.com"  type="text" name="correo" class="form-control col-md-9">
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label form="" class="clo-2">CUI: </label>
                                    <input placeholder="Solo numero puede ingresar" type="number" name="cui" class="form-control col-md-9">
                                </div>
                                <div class="col-md-6"> 
                                    <label for="genero" class="col-4">Género:</label>
                                    <div class="col-md-12">
                                        <select name="genero" id="genero" class="form-control">
                                        <option selected>Selecciones genero</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row form-group">
                                <div class="col-md-6 col-sm-12 mb-2 mb-md-0 text-center">
                                    <button type="submit" class="btn btn-primary custom-btn-width btn-block">Guardar</button>
                                </div>
                                <div class="col-md-6 col-sm-12 text-center">
                                    <a class="btn btn-danger custom-btn-width btn-block" href="{{ url('/menualu') }}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
