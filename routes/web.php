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

Route::get('/formdocente',[App\Http\Controllers\HomeController::class, 'registro'])->middleware('auth.admin');

Route::get('/menualu',[App\Http\Controllers\HomeController::class, 'menualumno'])->middleware('auth.admin');

Route::get('/menudocen',[App\Http\Controllers\HomeController::class, 'menudocente'])->middleware('auth.admin');

Route::get('/menucurso',[App\Http\Controllers\HomeController::class, 'menucurso'])->middleware('auth.admin');

Route::get('/menuadmon',[App\Http\Controllers\HomeController::class, 'menuadmon'])->middleware('auth.admin');

Route::get('/menupadre',[App\Http\Controllers\HomeController::class, 'menupadre'])->middleware('auth.admin');

Route::get('/menupensum',[App\Http\Controllers\HomeController::class, 'menupensum'])->middleware('auth.admin');

Route::get('/menugraduandos',[App\Http\Controllers\HomeController::class, 'menugraduandos'])->middleware('auth.admin');

Route::post('/savedocente', [App\Http\Controllers\DocenteController::class, 'savedocente'])->middleware('auth.admin')
->name('savedocente');

Route::get('/listardocente', [App\Http\Controllers\DocenteController::class, 'listardocente'])->middleware('auth.admin');

Route::delete('/delete/{id}',[App\Http\Controllers\DocenteController::class, 'delete'])->middleware('auth.admin')->name('delete');

Route::get('/editdocente/{id}',[App\Http\Controllers\DocenteController::class, 'editdocente'])->middleware('auth.admin')->name('editdocente');

Route::patch('/edit/{id}',[App\Http\Controllers\DocenteController::class, 'edit'])->middleware('auth.admin')->name('edit');

Route::get('/formalumno',[App\Http\Controllers\AlumnoController::class, 'registroalumno'])->middleware('auth.admin');

Route::post('/savealumno', [App\Http\Controllers\AlumnoController::class, 'savealumno'])->middleware('auth.admin')
->name('savealumno');

Route::get('/listaralumno', [App\Http\Controllers\AlumnoController::class, 'listaralumno'])->middleware('auth.admin');

Route::delete('/deletealumno/{id}',[App\Http\Controllers\AlumnoController::class, 'deletealumno'])->middleware('auth.admin')->name('deletealumno');

Route::get('/editalumno/{id}',[App\Http\Controllers\AlumnoController::class, 'editalumno'])->middleware('auth.admin')->name('editalumno');

Route::patch('/editalu/{id}',[App\Http\Controllers\AlumnoController::class, 'editalu'])->middleware('auth.admin')->name('editalu');

Route::get('/formadmon',[App\Http\Controllers\AdministracionController::class, 'registro'])->middleware('auth.admin');

Route::post('/saveadmon', [App\Http\Controllers\AdministracionController::class, 'saveadmon'])->middleware('auth.admin')
->name('saveadmon');

Route::get('/listaradmon', [App\Http\Controllers\AdministracionController::class, 'listaradmon'])->middleware('auth.admin');

Route::delete('/deleteadmon/{id}',[App\Http\Controllers\AdministracionController::class, 'deleteadmon'])->middleware('auth.admin')->name('deleteadmon');

Route::get('/editadmon/{id}',[App\Http\Controllers\AdministracionController::class, 'editadmon'])->middleware('auth.admin')->name('editadmon');

Route::patch('/editad/{id}',[App\Http\Controllers\AdministracionController::class, 'editad'])->middleware('auth.admin')->name('editad');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth.admin')->name('admin.index');

Route::get('/formpadre',[App\Http\Controllers\PadreController::class, 'padre'])->middleware('auth.admin');

Route::post('/savepadre', [App\Http\Controllers\PadreController::class, 'savepadre'])->middleware('auth.admin')
->name('savepadre');

Route::get('/listarpadre', [App\Http\Controllers\PadreController::class, 'listarpadre'])->middleware('auth.admin');

Route::delete('/deletepadre/{id}',[App\Http\Controllers\PadreController::class, 'deletepadre'])->middleware('auth.admin')->name('deletepadre');

Route::get('/editpadre/{id}',[App\Http\Controllers\PadreController::class, 'editpadre'])->middleware('auth.admin')->name('editpadre');

Route::patch('/editencargado/{id}', [App\Http\Controllers\PadreController::class, 'editencargado'])->middleware('auth.admin')->name('editencargado');

Route::get('/formpensum',[App\Http\Controllers\PensumController::class, 'registro'])->middleware('auth.admin');

Route::post('/savepensum', [App\Http\Controllers\PensumController::class, 'savepensum'])
->middleware('auth.admin')->name('savepensum');

Route::get('/listarpensum', [App\Http\Controllers\PensumController::class, 'listarpensum'])->middleware('auth.admin');

Route::delete('/deletepensum/{id}',[App\Http\Controllers\PensumController::class, 'deletepensum'])->middleware('auth.admin')->name('deletepensum');

Route::get('/editpensum/{id}',[App\Http\Controllers\PensumController::class, 'editpensum'])->middleware('auth.admin')->name('editpensum');

Route::patch('/editpen/{id}', [App\Http\Controllers\PensumController::class, 'editpen'])->middleware('auth.admin')->name('editpen');

Route::get('/formgraduando',[App\Http\Controllers\graduandosController::class, 'registro'])->middleware('auth.admin');

Route::post('/savegraduando', [App\Http\Controllers\graduandosController::class, 'savegraduando'])
->middleware('auth.admin')->name('savegraduando');

Route::get('/listargraduando', [App\Http\Controllers\graduandosController::class, 'listargraduando'])->middleware('auth.admin');

Route::delete('/deletegraduando/{id}',[App\Http\Controllers\graduandosController::class, 'deletegraduando'])->middleware('auth.admin')->name('deletegraduando');

Route::get('/editgraduando/{id}',[App\Http\Controllers\graduandosController::class, 'editgraduando'])->middleware('auth.admin')->name('editgraduando');

Route::patch('/editgrad/{id}', [App\Http\Controllers\graduandosController::class, 'editgrad'])->middleware('auth.admin')->name('editgrad');
