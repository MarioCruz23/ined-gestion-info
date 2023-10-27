<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumno;
use App\Models\padreencargado;

class PadreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        return response()->json(['message' => 'Padre o encargado guardado exitosamente']);
    }
    public function listarpadre(){
        $data['padre_encargados'] = padreencargado::paginate(50);

        return view('Alumno.listapadre', $data);
    }
    public function deletepadre($id){
        padreencargado::destroy($id);
        return response()->json(['message' => 'Padre o Encargado eliminado exitosamente']);
    }
    public function editpadre($id){
        $editpadre = padreencargado::findOrFail($id);
        $alumnos = alumno::all();
        return view('Alumno.editpadre', compact('editpadre', 'alumnos'));
    }
    public function editencargado(Request $request, $id){
        $datoencargado = request()->except((['_token','_method']));
        padreencargado::where('id', '=', $id)->update($datoencargado);
        return response()->json(['message' => 'Datos del padre o encargado modificados exitosamente']);
    }
    public function searchPadre(Request $request) {
        $search = $request->input('search');
        $data['padre_encargados'] = PadreEncargado::where('nombre', 'like', '%' . $search . '%')
            ->orWhere('apellido', 'like', '%' . $search . '%')
            ->orWhere('telefono', 'like', '%' . $search . '%')
            ->orWhere('direccion', 'like', '%' . $search . '%')
            ->orWhereHas('alumno', function ($query) use ($search) {
                $query->where('nombre', 'like', '%' . $search . '%')
                      ->orWhere('apellido', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        return view('Alumno.listapadre', $data);
    }    
}
