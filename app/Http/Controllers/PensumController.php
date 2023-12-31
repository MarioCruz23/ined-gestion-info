<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pensum;

class PensumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function registro(){
        return view('pensum.registro');
    }
    public function savepensum(Request $request){
        $validator = $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'archivopensum' => 'file|required'
        ]);
        $pensumdata = $request->except('_token');
        if ($request->hasFile('archivopensum')) {
            $file = $request->file('archivopensum');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $pensumdata['archivopensum'] = $fileName;
        }
        pensum::insert($pensumdata);
        return response()->json(['message' => 'Pensum guardado exitosamente']);
    }
    public function listarpensum(){
        $pensum['pensums']=pensum::paginate(30);
        return view('pensum.listapensum', $pensum);
    }
    public function deletepensum($id){
        pensum::destroy($id);
        return response()->json(['message' => 'Pensum eliminado exitosamente']);
    }
    public function editpensum($id){
        $editpensum = pensum::findOrFail($id);
        return view('pensum.editpensum', compact('editpensum'));
    }     
    public function editpen(Request $request, $id) {
        $pensum = pensum::findOrFail($id);
        $pensumdata = $request->except(['_token', '_method']);
        if ($request->hasFile('archivopensum')) {
            $archivoFile = $request->file('archivopensum');
            $archivoFileName = $archivoFile->getClientOriginalName();
            $archivoFile->move(public_path('uploads'), $archivoFileName);
            $pensumdata['archivopensum'] = $archivoFileName;
        }
        $pensum->update($pensumdata);
        return response()->json(['message' => 'Dato del pensum fue modificado exitosamente']);
    }
    public function searchPensum(Request $request) {
        $search = $request->input('search');
        $pensum['pensums'] = pensum::where('nombre', 'like', '%' . $search . '%')->paginate(10);
        return view('pensum.listapensum', $pensum);
    }    
}
