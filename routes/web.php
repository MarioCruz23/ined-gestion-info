<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas con acceso permitido a usuarios con el rol de admin

//Vistas de menús de gestiones 
Route::get('/menualu',[App\Http\Controllers\HomeController::class, 'menualumno'])->middleware('auth.admin');

Route::get('/menudocen',[App\Http\Controllers\HomeController::class, 'menudocente'])->middleware('auth.admin');

Route::get('/menucurso',[App\Http\Controllers\HomeController::class, 'menucurso'])->middleware('auth.admin');

Route::get('/menuadmon',[App\Http\Controllers\HomeController::class, 'menuadmon'])->middleware('auth.admin');

Route::get('/menupadre',[App\Http\Controllers\HomeController::class, 'menupadre'])->middleware('auth.admin');

Route::get('/menupensum',[App\Http\Controllers\HomeController::class, 'menupensum'])->middleware('auth.admin');

Route::get('/menugraduandos',[App\Http\Controllers\HomeController::class, 'menugraduandos'])->middleware('auth.admin');

Route::get('/menuinscripcion',[App\Http\Controllers\HomeController::class, 'menuinscripcion'])->middleware('auth.admin');

//Gestiones de docentes
Route::get('/formdocente',[App\Http\Controllers\HomeController::class, 'registro'])->middleware('auth.admin');

Route::post('/savedocente', [App\Http\Controllers\DocenteController::class, 'savedocente'])->middleware('auth.admin')
->name('savedocente');

Route::get('/listardocente', [App\Http\Controllers\DocenteController::class, 'listardocente'])->middleware('auth.admin');

Route::delete('/delete/{id}',[App\Http\Controllers\DocenteController::class, 'delete'])->middleware('auth.admin')->name('delete');

Route::get('/editdocente/{id}',[App\Http\Controllers\DocenteController::class, 'editdocente'])->middleware('auth.admin')->name('editdocente');

Route::patch('/edit/{id}',[App\Http\Controllers\DocenteController::class, 'edit'])->middleware('auth.admin')->name('edit');

//Gestiones de alumno
Route::get('/formalumno',[App\Http\Controllers\AlumnoController::class, 'registroalumno'])->middleware('auth.admin');

Route::post('/savealumno', [App\Http\Controllers\AlumnoController::class, 'savealumno'])->middleware('auth.admin')
->name('savealumno');

Route::get('/listaralumno', [App\Http\Controllers\AlumnoController::class, 'listaralumno'])->middleware('auth.admin');

Route::delete('/deletealumno/{id}',[App\Http\Controllers\AlumnoController::class, 'deletealumno'])->middleware('auth.admin')->name('deletealumno');

Route::get('/editalumno/{id}',[App\Http\Controllers\AlumnoController::class, 'editalumno'])->middleware('auth.admin')->name('editalumno');

Route::patch('/editalu/{id}',[App\Http\Controllers\AlumnoController::class, 'editalu'])->middleware('auth.admin')->name('editalu');

//Gestiones administrativas
Route::get('/formadmon',[App\Http\Controllers\AdministracionController::class, 'registro'])->middleware('auth.admin');

Route::post('/saveadmon', [App\Http\Controllers\AdministracionController::class, 'saveadmon'])->middleware('auth.admin')
->name('saveadmon');

Route::get('/listaradmon', [App\Http\Controllers\AdministracionController::class, 'listaradmon'])->middleware('auth.admin');

Route::delete('/deleteadmon/{id}',[App\Http\Controllers\AdministracionController::class, 'deleteadmon'])->middleware('auth.admin')->name('deleteadmon');

Route::get('/editadmon/{id}',[App\Http\Controllers\AdministracionController::class, 'editadmon'])->middleware('auth.admin')->name('editadmon');

Route::patch('/editad/{id}',[App\Http\Controllers\AdministracionController::class, 'editad'])->middleware('auth.admin')->name('editad');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');

//Gestiones de padre o encargado
Route::get('/formpadre',[App\Http\Controllers\PadreController::class, 'padre'])->middleware('auth.admin');

Route::post('/savepadre', [App\Http\Controllers\PadreController::class, 'savepadre'])->middleware('auth.admin')
->name('savepadre');

Route::get('/listarpadre', [App\Http\Controllers\PadreController::class, 'listarpadre'])->middleware('auth.admin');

Route::delete('/deletepadre/{id}',[App\Http\Controllers\PadreController::class, 'deletepadre'])->middleware('auth.admin')->name('deletepadre');

Route::get('/editpadre/{id}',[App\Http\Controllers\PadreController::class, 'editpadre'])->middleware('auth.admin')->name('editpadre');

Route::patch('/editencargado/{id}', [App\Http\Controllers\PadreController::class, 'editencargado'])->middleware('auth.admin')->name('editencargado');

//Gestiones de pensum
Route::get('/formpensum',[App\Http\Controllers\PensumController::class, 'registro'])->middleware('auth.admin');

Route::post('/savepensum', [App\Http\Controllers\PensumController::class, 'savepensum'])
->middleware('auth.admin')->name('savepensum');

Route::get('/listarpensum', [App\Http\Controllers\PensumController::class, 'listarpensum'])->middleware('auth.admin');

Route::delete('/deletepensum/{id}',[App\Http\Controllers\PensumController::class, 'deletepensum'])->middleware('auth.admin')->name('deletepensum');

Route::get('/editpensum/{id}',[App\Http\Controllers\PensumController::class, 'editpensum'])->middleware('auth.admin')->name('editpensum');

Route::patch('/editpen/{id}', [App\Http\Controllers\PensumController::class, 'editpen'])->middleware('auth.admin')->name('editpen');

//gestiones de graduandos
Route::get('/formgraduando',[App\Http\Controllers\graduandosController::class, 'registro'])->middleware('auth.admin');

Route::post('/savegraduando', [App\Http\Controllers\graduandosController::class, 'savegraduando'])
->middleware('auth.admin')->name('savegraduando');

Route::get('/listargraduando', [App\Http\Controllers\graduandosController::class, 'listargraduando'])->middleware('auth.admin');

Route::delete('/deletegraduando/{id}',[App\Http\Controllers\graduandosController::class, 'deletegraduando'])->middleware('auth.admin')->name('deletegraduando');

Route::get('/editgraduando/{id}',[App\Http\Controllers\graduandosController::class, 'editgraduando'])->middleware('auth.admin')->name('editgraduando');

Route::patch('/editgrad/{id}', [App\Http\Controllers\graduandosController::class, 'editgrad'])->middleware('auth.admin')->name('editgrad');

//Gestiones de cursos
Route::get('/formcurso',[App\Http\Controllers\cursoController::class, 'formcurso'])->middleware('auth.admin');

Route::post('/savecurso', [App\Http\Controllers\cursoController::class, 'savecurso'])
->middleware('auth.admin')->name('savecurso');

Route::get('/listarcurso', [App\Http\Controllers\cursoController::class, 'listarcurso'])->middleware('auth.admin');

Route::delete('/deletecurso/{id}',[App\Http\Controllers\cursoController::class, 'deletecurso'])->middleware('auth.admin')->name('deletecurso');

Route::get('/editcurso/{id}',[App\Http\Controllers\cursoController::class, 'editcurso'])->middleware('auth.admin')->name('editcurso');

Route::patch('/editcur/{id}', [App\Http\Controllers\cursoController::class, 'editcur'])->middleware('auth.admin')->name('editcur');

//Gestiones de inscripción de alumnos
Route::get('/forminscripcion',[App\Http\Controllers\inscripcionController::class, 'forminscripcion'])->middleware('auth.admin');

Route::post('/saveinscripcion', [App\Http\Controllers\inscripcionController::class, 'saveinscripcion'])
->middleware('auth.admin')->name('saveinscripcion');

Route::get('/listarinscripcion', [App\Http\Controllers\inscripcionController::class, 'listarinscripcion'])->middleware('auth.admin');

Route::delete('/deleteinscripcion/{id}',[App\Http\Controllers\inscripcionController::class, 'deleteinscripcion'])->middleware('auth.admin')->name('deleteinscripcion');

Route::get('/editinscripcion/{id}',[App\Http\Controllers\inscripcionController::class, 'editinscripcion'])->middleware('auth.admin')->name('editinscripcion');

Route::patch('/editins/{id}', [App\Http\Controllers\inscripcionController::class, 'editins'])->middleware('auth.admin')->name('editins');

Route::get('/get-student-name', [App\Http\Controllers\inscripcionController::class, 'getStudentName'])->name('getStudentName');

//Rutas que estan permitidas para el usuario Regina Peña

//Gestiones de asignación de curso a docente
Route::get('/menuasignación',[App\Http\Controllers\HomeController::class, 'menuasignación'])->middleware('can:update,App\User');

Route::get('/menuasignaciones',[App\Http\Controllers\HomeController::class, 'menuasignaciones'])->middleware('can:update,App\User');

Route::get('/formasignacion',[App\Http\Controllers\asignacionController::class, 'formasignacion'])->middleware('can:update,App\User');

Route::post('/saveasignacion', [App\Http\Controllers\asignacionController::class, 'saveasignacion'])
->middleware('can:update,App\User')->name('saveasignacion');

Route::get('/listarasignacion', [App\Http\Controllers\asignacionController::class, 'listarasignacion'])->middleware('can:update,App\User');

Route::delete('/deleteasignacion/{id}',[App\Http\Controllers\asignacionController::class, 'deleteasignacion'])->middleware('can:update,App\User')->name('deleteasignacion');

Route::get('/editasignacion/{id}',[App\Http\Controllers\asignacionController::class, 'editasignacion'])->middleware('can:update,App\User')->name('editasignacion');

Route::patch('/editasig/{id}', [App\Http\Controllers\asignacionController::class, 'editasig'])->middleware('can:update,App\User')->name('editasig');

//Asignacion de roles de usuario
Route::get('/listarol', [App\Http\Controllers\AdminController::class, 'listarol'])->middleware('can:update,App\User');

Route::delete('/deleterol/{id}',[App\Http\Controllers\AdminController::class, 'deleterol'])->middleware('can:update,App\User')->name('deleterol');

Route::get('/editroles/{id}',[App\Http\Controllers\AdminController::class, 'editroles'])->middleware('can:update,App\User')->name('editroles');

Route::patch('/editrol/{id}', [App\Http\Controllers\AdminController::class, 'editrol'])->middleware('can:update,App\User')->name('editrol');

//Ritas de busque de informacion
Route::get('/searchAdmon', [App\Http\Controllers\AdministracionController::class, 'searchAdmon'])->middleware('auth.admin')->name('searchAdmon');

Route::get('/searchUser', [App\Http\Controllers\AdminController::class, 'searchUser'])->middleware('can:update,App\User')->name('searchUser');

Route::get('/searchAsignacion', [App\Http\Controllers\asignacionController::class, 'searchAsignacion'])->middleware('can:update,App\User')->name('searchAsignacion');

Route::get('/searchInscripcion', [App\Http\Controllers\inscripcionController::class, 'searchInscripcion'])->middleware('auth.admin')->name('searchInscripcion');
