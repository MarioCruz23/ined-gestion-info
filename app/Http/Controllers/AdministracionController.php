<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    public function registro(){
        return view('administracion.registroadmon');
    }
    public function saveadmon(Request $request){
        $validator = $this->validate($request, [
            'codigoadmon' => 'required|string|max:255',
            'nombreact' => 'required|string|max:255',
            'fecha' => 'required',
            'descripcion' => 'required|string|max:255',
            'archivo' => 'file|required'
        ]);
        $archivo = $request->file('archivo');
        $nombreArchivo = $archivo->store('archivos');

        $admondata = [
            'codigoadmon' => $request->input('codigoadmon'),
            'nombreact' => $request->input('nombreact'),
            'fecha' => $request->input('fecha'),
            'descripcion' => $request->input('descripcion'),
            'archivo' => $nombreArchivo,
    ];

    Administracion::create($admondata);
        return back()->with('actividadAdmonGuardado', 'Actividad administrativa guardada');
    }
    public function listaradmon(){
        $admon['admons']=Administracion::paginate(10);
        return view('administracion.listaadmon', $admon);
    }
    public function deleteadmon($id){
        Administracion::destroy($id);
        return back()->with('actividadadmonEliminado', 'Actividad Aministrativa Eliminado');
    }
}
