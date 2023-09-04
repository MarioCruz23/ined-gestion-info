<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;

class AlumnoController extends Controller
{
    public function registroalumno (){
        return view('Alumno.registro');
    }
    public function savealumno(Request $request){

        $validator = $this->validate($request, [
            'codigoes' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer',
            'fechanac' => 'required',
            'telefono' => 'required|string|max:8',
            'direccion' => 'required|string|max:255',
            'correo' => 'required||string|max:255|email|unique:docente',
            'cui' => 'required|string|max:255',
            'genero'=> 'required'
        ]);
        $alumnodata = request()->except('_token');
        alumno::insert($alumnodata);

        return back()->with('alumnoGuardado', 'Alumno Guardado');
    }
    public function listaralumno (){
        $data['alumnos'] = alumno::paginate(50);

        return view('Alumno.lista', $data);
    }
}
