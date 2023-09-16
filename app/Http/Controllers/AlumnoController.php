<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;

class AlumnoController extends Controller
{
    public function registroalumno (){
        return view('Alumno.registro');
    }
    public function menualumno (){
        return view('Alumno.Menualu');
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
    public function deletealumno ($id){
        alumno::destroy($id);
        return back()->with('alumnoEliminado', 'Alumno Eliminado');
    }
    public function editalumno($id){
        $editalumno = alumno::findOrFail($id);
        $generos = ['Masculino', 'Femenino'];
        return view('Alumno.editalumno', compact('editalumno', 'generos'));
    }     
    public function editalu(Request $request, $id){
        $datoalumno = request()->except((['_token','_method']));
        alumno::where('id', '=', $id)->update($datoalumno);
        return back()->with('alumnoModificado','Dato fue modificado');
    }
}
