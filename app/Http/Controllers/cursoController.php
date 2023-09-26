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
}
