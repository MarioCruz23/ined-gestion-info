<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\graduandos;
use App\Models\pensum;

class graduandosController extends Controller
{
    public function registro(){
        $pensumids=pensum::all();
        return view('Graduandos.registro', compact('pensumids'));
    }
}
