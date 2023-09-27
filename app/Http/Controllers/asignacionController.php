<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\docente;
use App\Models\curso;


class asignacionController extends Controller
{
    public function formasignacion (){
        $docenteids=docente::all();
        $cursoids=curso::all();
        return view('docente.formasignacion', compact('cursoids', 'docenteids'));
    }
}
