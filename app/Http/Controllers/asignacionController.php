<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\docente;
use App\Models\curso;
use App\Models\asignacion;


class asignacionController extends Controller
{
    public function formasignacion (){
        $docenteids=docente::all();
        $cursoids=curso::all();
        return view('docente.formasignacion', compact('cursoids', 'docenteids'));
    }
    public function saveasignacion(Request $request){
        $validator = $this->validate($request, [
            'grado' => 'required|string|max:255',
            'docente_id' => 'required',
            'curso_id' => 'required',
        ]);
        $asignaciondata = request()->except('_token');
        asignacion::insert($asignaciondata);
        return back()->with('asignacionGuardado', 'Asignación de curso a docente Guardado');
    }    
}
