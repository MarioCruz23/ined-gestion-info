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
    public function menuadmon(){
        return view('administracion.Menuadmon');
    }
    public function menupadre(){
        return view('Alumno.menupadre');
    }
    public function menupensum(){
        return view('pensum.menupensum');
    }
    public function menugraduandos(){
        return view('Graduandos.menu');
    }
    public function menuinscripcion(){
        return view('Alumno.menuinscripcion');
    }
    public function menuasignación(){
        return view('docente.menuasignacion');
    }
    public function menuasignaciones(){
        return view('roles.menuasignaciones');
    }
}
