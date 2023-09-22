<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pensum;

class PensumController extends Controller
{
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
        return back()->with('pensumGuardado', 'Pensum guardada');
    }
    public function listarpensum(){
        $pensum['pensums']=pensum::paginate(30);
        return view('pensum.listapensum', $pensum);
    }
    public function deletepensum($id){
        pensum::destroy($id);
        return back()->with('pensumEliminado', 'Pensum Eliminado');
    }
    public function editpensum($id){
        $editpensum = pensum::findOrFail($id);
        return view('pensum.editpensum', compact('editpensum'));
    }     
    public function editpen(Request $request, $id){
        $datopensum = request()->except((['_token','_method']));
        pensum::where('id', '=', $id)->update($datopensum);
        return back()->with('pensumModificado','Dato del pensum fue modificado');
    }
}
