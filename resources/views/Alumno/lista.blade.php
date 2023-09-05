@extends('layouts.app')
<div class="container mt-5">
    <div class="row justify_content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Alumnos Registrados</h2>
            <a class="btn btn-success mb-4" href="{{ url('/formalumno') }}">Nuevo Docente</a>
            @if(session('alumnoEliminado'))
            <div class="alert alert-success">
                {{ session('alumnoEliminado') }}
            </div>
            @endif
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Código Estudiante</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>
                        <th>Fecha nacimiento</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>CUI</th>
                        <th>Género</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->codigoes }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellido }}</td>
                        <td>{{ $alumno->edad }}</td>
                        <td>{{ $alumno->fechanac }}</td>
                        <td>{{ $alumno->telefono }}</td>
                        <td>{{ $alumno->direccion }}</td>
                        <td>{{ $alumno->correo }}</td>
                        <td>{{ $alumno->cui }}</td>
                        <td>{{ $alumno->genero }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('editalumno', $alumno->id) }}" class="btn btn-primary mb-3 mr-3">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('deletealumno', $alumno->id) }}" method="POST" class="Alert-eliminar">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro quiere borrar los datos del alumno?');" class="btn btn-danger btn-block">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $alumnos->links() }}
        </div>
    </div>
</div>