<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;
use App\Models\padreencargado;

class PadreController extends Controller
{
    public function padre (){
        $alumnoids=alumno::all();
        return view('Alumno.formpadre', compact('alumnoids'));
    }
    public function savepadre(Request $request){
        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'apellido'=> 'required|string|max:255',
            'telefono' => 'required|string|max:8',
            'direccion' => 'required|string|max:255',
            'alumno_id'=> 'required',
        ]);
        $padredata=request()->except('_token');
        padreencargado::insert($padredata);
        return back()->with('padreGuardado', 'Padre o encargado Guardado');
    }
    public function listarpadre(){
        $data['padre_encargados'] = padreencargado::paginate(50);

        return view('Alumno.listapadre', $data);
    }
}
