<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;
use App\Models\padreencargado;

class AlumnoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        return response()->json(['message' => 'Alumno guardado exitosamente']);
    }
    public function listaralumno (){
        $data['alumnos'] = alumno::paginate(50);

        return view('Alumno.lista', $data);
    }
    public function deletealumno ($id){
        alumno::destroy($id);
        return response()->json(['message' => 'Alumno eliminado exitosamente']);
    }
    public function editalumno($id){
        $editalumno = alumno::findOrFail($id);
        $generos = ['Masculino', 'Femenino'];
        return view('Alumno.editalumno', compact('editalumno', 'generos'));
    }     
    public function editalu(Request $request, $id){
        $datoalumno = request()->except((['_token','_method']));
        alumno::where('id', '=', $id)->update($datoalumno);
        return response()->json(['message' => 'Datos del alumno modificados exitosamente']);
    }
    public function searchAlumno(Request $request) {
        $search = $request->input('search');
        $data['alumnos'] = Alumno::where('codigoes', 'like', '%' . $search . '%')
            ->orWhere('nombre', 'like', '%' . $search . '%')
            ->orWhere('apellido', 'like', '%' . $search . '%')
            ->orWhere('telefono', 'like', '%' . $search . '%')
            ->orWhere('correo', 'like', '%' . $search . '%')
            ->orWhere('cui', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('Alumno.lista', $data);
    }    
}
