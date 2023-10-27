<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('admin');
    }
    public function listarol(){
        $rol['rols']=User::paginate(12);
        return view('roles.listarol', $rol);
    }
    public function deleterol($id) {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['message' => 'Usuario eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Se produjo un error al eliminar el usuario']);
        }
    }    
    public function editroles($id){
        $editrol = User::findOrFail($id);
        return view('roles.editrol', compact('editrol'));
    }     
    public function editrol(Request $request, $id){
        $datorol = request()->except((['_token','_method']));
        User::where('id', '=', $id)->update($datorol);
        return response()->json(['message' => 'Rol del usuario modificado exitosamente']);
    }
    public function searchUser(Request $request) {
        $search = $request->input('search');
        $rol['rols'] = User::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->orWhere('role', 'LIKE', '%' . $search . '%')
            ->paginate(12);
        return view('roles.listarol', $rol);
    }    
}
