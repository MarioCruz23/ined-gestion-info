<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\curso;
use App\Models\pensum;

class cursoController extends Controller
{
    public function formcurso(){
        $pensumids=pensum::all();
        return view('Curso.registrocurso', compact('pensumids'));
    }
    public function savecurso(Request $request){
        $validator = $this->validate($request, [
            'codigocurso' => 'required|string|max:255',
            'nombre'=> 'required|string|max:255',
            'area'=> 'required|string|max:255',
            'pensum_id'=> 'required',
        ]);
        $cursodata=request()->except('_token');
        curso::insert($cursodata);
        return back()->with('cursoGuardado', 'Curso Guardado');
    }
    public function listarcurso(){
        $data['cursos'] = curso::paginate(50);
        return view('Curso.listacurso', $data);
    }
    public function deletecurso($id){
        curso::destroy($id);
        return back()->with('cursoEliminado', 'Curso Eliminado');
    }
    public function editcurso($id){
        $editcurso = curso::findOrFail($id);
        $pensums = pensum::all();
        return view('Curso.editcurso', compact('editcurso', 'pensums'));
    }
    public function editcur(Request $request, $id){
        $datocurso = request()->except((['_token','_method']));
        curso::where('id', '=', $id)->update($datocurso);
        return back()->with('cursoModificado','Curso modificado');
    }
}
