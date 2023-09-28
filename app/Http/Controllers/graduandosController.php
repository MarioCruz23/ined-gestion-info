<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\graduandos;
use App\Models\pensum;

class graduandosController extends Controller
{
    public function registro(){
        $pensumids=pensum::all();
        return view('Graduandos.registro', compact('pensumids'));
    }
    public function savegraduando(Request $request){
        $validator = $this->validate($request, [
            'codigoalu' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'anio' => 'required',
            'titulo' => 'file|required',
            'constancia' => 'file|required',
            'pensum_id'=> 'required'
        ]);
        $graduandodata = $request->except('_token');
        if ($request->hasFile('titulo')) {
            $file = $request->file('titulo');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $graduandodata['titulo'] = $fileName;
        }
        if ($request->hasFile('constancia')) {
            $file = $request->file('constancia');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $graduandodata['constancia'] = $fileName;
        }
        graduandos::insert($graduandodata);
        return back()->with('graduandoGuardado', 'Graduando guardada');
    }
    public function listargraduando(){
        $graduando['graduandos']=graduandos::paginate(20);
        return view('Graduandos.lista', $graduando);
    }
    public function deletegraduando($id){
        graduandos::destroy($id);
        return back()->with('graduandoEliminado', 'Graduando Eliminado');
    }
    public function editgraduando($id){
        $editgraduando = graduandos::findOrFail($id);
        $pensums=pensum::all();
        return view('Graduandos.edit', compact('editgraduando', 'pensums'));
    }     
    public function editgrad(Request $request, $id){
        $datograduando = request()->except((['_token','_method']));
        graduandos::where('id', '=', $id)->update($datograduando);
        return back()->with('graduandoModificado',' dato del Graduando fue modificado');
    }
    public function searchGraduando(Request $request) {
        $search = $request->input('search');
        $graduandos['graduandos'] = graduandos::where('codigoalu', 'like', '%' . $search . '%')
            ->orWhere('nombre', 'like', '%' . $search . '%')
            ->orWhere('apellido', 'like', '%' . $search . '%')
            ->orWhere('anio', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('Graduandos.lista', $graduandos);
    }    
}
