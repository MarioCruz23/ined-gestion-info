<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;
use App\Models\inscripcion;

class inscripcionController extends Controller
{
    public function forminscripcion (){
        $alumnoids=alumno::all();
        return view('Alumno.forminscripción', compact('alumnoids'));
    }
    public function getStudentName(Request $request) {
        $codigoes = $request->input('codigoes');
        $student = Alumno::where('codigoes', $codigoes)->first();
        if ($student) {
            return response()->json([
                'success' => true,
                'data' => [
                    'nombre' => $student->nombre,
                    'apellido' => $student->apellido
                ]
            ]);
        }
        return response()->json([
            'success' => false,
        ]);
    }
    public function saveinscripcion(Request $request) {
        $request->validate([
            'codigoes' => 'required', 
            'nacionalidad' => 'required',
            'grado' => 'required',
            'anio' => 'required',
        ]);
        $student = Alumno::where('codigoes', $request->input('codigoes'))->first();
        if ($student) {
            $inscripcion = new Inscripcion;
            $inscripcion->alumno_id = $student->id; 
            $inscripcion->nacionalidad = $request->input('nacionalidad');
            $inscripcion->grado = $request->input('grado');
            $inscripcion->anio = $request->input('anio');
            $inscripcion->save();
            return back()->with('inscripcionGuardado', 'Estudiante inscrito exitosamente');
        }
        return back()->with('error', 'Estudiante no encontrado');
    }    
    public function listarinscripcion(){
        $data['inscripcions'] = inscripcion::paginate(30);

        return view('Alumno.listainscripcion', $data);
    }
    public function deleteinscripcion($id){
        inscripcion::destroy($id);
    return back()->with('inscripcionEliminado', 'Estudiante inscrito Eliminado');
}
}
