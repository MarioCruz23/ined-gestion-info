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
        $pensum['pensums']=pensum::paginate(10);
        return view('pensum.listapensum', $pensum);
    }
}
