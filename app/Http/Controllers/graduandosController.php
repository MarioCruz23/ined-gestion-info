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
        return response()->json(['message' => 'Graduando guardado exitosamente']);
    }
    public function listargraduando(){
        $graduando['graduandos']=graduandos::paginate(20);
        return view('Graduandos.lista', $graduando);
    }
    public function deletegraduando($id){
        graduandos::destroy($id);
        return response()->json(['message' => 'Graduando eliminado exitosamente']);
    }
    public function editgraduando($id){
        $editgraduando = graduandos::findOrFail($id);
        $pensums=pensum::all();
        return view('Graduandos.edit', compact('editgraduando', 'pensums'));
    }     
    public function editgrad(Request $request, $id) {
        $graduando = graduandos::findOrFail($id);
        $graduandodata = $request->except(['_token', '_method']);
        if ($request->hasFile('titulo')) {
            $tituloFile = $request->file('titulo');
            $tituloFileName = $tituloFile->getClientOriginalName();
            $tituloFile->move(public_path('uploads'), $tituloFileName);
            $graduandodata['titulo'] = $tituloFileName;
        }
        if ($request->hasFile('constancia')) {
            $constanciaFile = $request->file('constancia');
            $constanciaFileName = $constanciaFile->getClientOriginalName();
            $constanciaFile->move(public_path('uploads'), $constanciaFileName);
            $graduandodata['constancia'] = $constanciaFileName;
        }
        $graduando->update($graduandodata);
        return response()->json(['message' => 'Datos del Graduando fueron modificados exitosamente']);
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
