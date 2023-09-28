<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin');
    }
    public function listarol(){
        $rol['rols']=User::paginate(12);
        return view('roles.listarol', $rol);
    }
    public function deleterol($id){
        User::destroy($id);
        return back()->with('usuarioEliminado', 'Usuario Eliminado');
    }
    public function editroles($id){
        $editrol = User::findOrFail($id);
        return view('roles.editrol', compact('editrol'));
    }     
    public function editrol(Request $request, $id){
        $datorol = request()->except((['_token','_method']));
        User::where('id', '=', $id)->update($datorol);
        return back()->with('usuarioModificado','Usuario fue modificado');
    }
}
