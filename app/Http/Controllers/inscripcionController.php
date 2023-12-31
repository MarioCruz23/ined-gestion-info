<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;
use App\Models\inscripcion;

class inscripcionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            return response()->json(['message' => 'Estudiante inscrito exitosamente']);
        }
        return back()->with('error', 'Estudiante no encontrado');
    }    
    public function listarinscripcion(){
        $data['inscripcions'] = inscripcion::paginate(30);

        return view('Alumno.listainscripcion', $data);
    }
    public function deleteinscripcion($id){
        inscripcion::destroy($id);
        return response()->json(['message' => 'Estudiante inscrito eliminado exitosamente']);
    }
    public function editinscripcion($id){
        $editinscripcion = inscripcion::findOrFail($id);
        $alumnos = alumno::all();
        $nombreCompleto = $editinscripcion->alumno->nombre . ' ' . $editinscripcion->alumno->apellido;        
        return view('Alumno.editinscripcion', compact('editinscripcion', 'alumnos', 'nombreCompleto'));
    }    
    public function editins(Request $request, $id){
        $request->validate([
            'codigoes' => 'required',
            'nacionalidad' => 'required',
            'grado' => 'required',
            'anio' => 'required',
        ]);
        $nuevoCodigo = $request->input('codigoes');
        $nuevoEstudiante = Alumno::where('codigoes', $nuevoCodigo)->first();
        if (!$nuevoEstudiante) {
            return back()->with('error', 'Nuevo estudiante no encontrado');
        }
        $datoinscripcion = $request->only(['nacionalidad', 'grado', 'anio']);
        $datoinscripcion['alumno_id'] = $nuevoEstudiante->id;
        inscripcion::where('id', '=', $id)->update($datoinscripcion);
        return response()->json(['message' => 'Datos de inscripción modificados exitosamente']);
    }    
    public function searchInscripcion(Request $request) {
        $search = $request->input('search');
        $data['inscripcions'] = Inscripcion::whereHas('alumno', function ($query) use ($search) {
            $query->where('nombre', 'like', '%' . $search . '%')
                  ->orWhere('apellido', 'like', '%' . $search . '%')
                  ->orWhere('codigoes', 'like', '%' . $search . '%');
        })->paginate(30);
        return view('Alumno.listainscripcion', $data);
    }
    
}
