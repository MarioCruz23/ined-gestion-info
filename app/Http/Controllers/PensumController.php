<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PensumController extends Controller
{
    public function registro(){
        return view('pensum.registro');
    }
}
