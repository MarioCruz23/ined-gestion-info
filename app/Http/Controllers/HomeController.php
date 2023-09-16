<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function registro(){
        return view('docente.registro');
    }
    public function menualumno(){
        return view('Alumno.Menualu');
    }
    public function menudocente(){
        return view('docente.Menudocente');
    }
    public function menucurso(){
        return view('Curso.Menucurso');
    }
}
