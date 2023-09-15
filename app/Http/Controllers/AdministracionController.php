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
        
        return view('administracion.editadmon', compact('editadmon'));
    }     
    public function editad(Request $request, $id){
        $datoadmon = request()->except((['_token','_method']));
        Administracion::where('id', '=', $id)->update($datoadmon);
        return back()->with('actividadAdministrativoModificado','Dato administrativo fue modificado');
    }
}
