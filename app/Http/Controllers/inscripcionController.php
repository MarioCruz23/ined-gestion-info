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
    public function editinscripcion($id){
        $editinscripcion = inscripcion::findOrFail($id);
        $alumnos = alumno::all();
        $nombreCompleto = $editinscripcion->alumno->nombre . ' ' . $editinscripcion->alumno->apellido;        
        return view('Alumno.editinscripcion', compact('editinscripcion', 'alumnos', 'nombreCompleto'));
    }    
    public function editins(Request $request, $id){
        $request->validate([
            'codigoes' => 'required', // Código del nuevo estudiante
            'nacionalidad' => 'required',
            'grado' => 'required',
            'anio' => 'required',
        ]);
        
        // Obtén el ID del nuevo estudiante basado en el código ingresado
        $nuevoCodigo = $request->input('codigoes');
        $nuevoEstudiante = Alumno::where('codigoes', $nuevoCodigo)->first();
    
        if (!$nuevoEstudiante) {
            return back()->with('error', 'Nuevo estudiante no encontrado');
        }
        
        // Actualiza la inscripción con el nuevo ID del estudiante
        $datoinscripcion = $request->only(['nacionalidad', 'grado', 'anio']);
        $datoinscripcion['alumno_id'] = $nuevoEstudiante->id;
        
        inscripcion::where('id', '=', $id)->update($datoinscripcion);
        
        return back()->with('inscripcionModificado','Dato fue modificado');
    }
    
    
}
