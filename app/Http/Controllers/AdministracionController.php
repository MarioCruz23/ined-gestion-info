<?php

namespace App\Http\Controllers;

use App\Models\Administracion;
use Illuminate\Http\Request;
use App\Models\Docente;

class AdministracionController extends Controller
{
    public function registro(){
        $docenteids=Docente::all();
        return view('administracion.registroadmon', compact('docenteids'));
    }
    public function saveadmon(Request $request){
        $validator = $this->validate($request, [
            'codigoadmon' => 'required|string|max:255',
            'nombreact' => 'required|string|max:255',
            'fecha' => 'required',
            'descripcion' => 'required|string|max:255',
            'archivo' => 'file|required',
            'docente_id'=> 'required'
        ]);
        $admondata = $request->except('_token');
        if ($request->hasFile('archivo')) {
            $file = $request->file('archivo');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $admondata['archivo'] = $fileName;
        }
        Administracion::insert($admondata);
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
    public function editadmon($id){
        $editadmon = Administracion::findOrFail($id);
        $docentes=Docente::all();
        return view('administracion.editadmon', compact('editadmon', 'docentes'));
    }     
    public function editad(Request $request, $id) {
        $admon = Administracion::findOrFail($id);
        $admondata = $request->except(['_token', '_method']);
        if ($request->hasFile('archivo')) {
            $archivoFile = $request->file('archivo');
            $archivoFileName = $archivoFile->getClientOriginalName();
            $archivoFile->move(public_path('uploads'), $archivoFileName);
            $admondata['archivo'] = $archivoFileName;
        }
        $admon->update($admondata);
        return back()->with('actividadAdministrativoModificado', 'Dato administrativo fue modificado');
    }
    
    public function searchAdmon(Request $request) {
        $searchTerm = $request->input('search');
        $admons = Administracion::where('nombreact', 'like', '%' . $searchTerm . '%')
            ->orWhere('descripcion', 'like', '%' . $searchTerm . '%')
            ->paginate(10);
        return view('administracion.listaadmon', compact('admons'));
    }    
}
