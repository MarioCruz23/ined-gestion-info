<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use Carbon\Carbon;

class DocenteController extends Controller{
    public function savedocente(Request $request){

        $validator = $this->validate($request, [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer',
            'fechanac' => 'required',
            'telefono' => 'required|string|max:8',
            'direccion' => 'required|string|max:255',
            'correo' => 'required||string|max:255|email|unique:docente',
            'genero'=> 'required'
        ]);
        $docentedata = request()->except('_token');
        Docente::insert($docentedata);
    
        return back()->with('docenteGuardado','Docente guardado');
    }
    public function listardocente(){
        $data['docentes'] = Docente::paginate(50);

        return view('docente.lista', $data);
    }
    public function delete($id){
        Docente::destroy($id);
        return back()->with('docenteEliminado','Docente eliminado');
    }
    public function editdocente($id){
        $editdocente = Docente::findOrFail($id);
        $generos = ['Masculino', 'Femenino'];
        return view('docente.editdocente', compact('editdocente', 'generos'));
    }     
    public function edit(Request $request, $id){
        $datodocente = request()->except((['_token','_method']));
        Docente::where('id', '=', $id)->update($datodocente);
        return back()->with('docenteModificado','Dato fue modificado');
    }
    public function searchDocente(Request $request) {
        $search = $request->input('search');
        $data['docentes'] = Docente::where('nombre', 'like', '%' . $search . '%')
            ->orWhere('apellido', 'like', '%' . $search . '%')
            ->orWhere('telefono', 'like', '%' . $search . '%')
            ->orWhere('correo', 'like', '%' . $search . '%')
            ->paginate(10);
        return view('docente.lista', $data);
    }    
}    
