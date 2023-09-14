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

Route::get('/formdocente',[App\Http\Controllers\HomeController::class, 'registro']);

Route::post('/savedocente', [App\Http\Controllers\DocenteController::class, 'savedocente'])
->name('savedocente');

Route::get('/listardocente', [App\Http\Controllers\DocenteController::class, 'listardocente']);

Route::delete('/delete/{id}',[App\Http\Controllers\DocenteController::class, 'delete'])->name('delete');

Route::get('/editdocente/{id}',[App\Http\Controllers\DocenteController::class, 'editdocente'])->name('editdocente');

Route::patch('/edit/{id}',[App\Http\Controllers\DocenteController::class, 'edit'])->name('edit');

Route::get('/formalumno',[App\Http\Controllers\AlumnoController::class, 'registroalumno']);

Route::post('/savealumno', [App\Http\Controllers\AlumnoController::class, 'savealumno'])
->name('savealumno');

Route::get('/listaralumno', [App\Http\Controllers\AlumnoController::class, 'listaralumno']);

Route::delete('/deletealumno/{id}',[App\Http\Controllers\AlumnoController::class, 'deletealumno'])->name('deletealumno');

Route::get('/editalumno/{id}',[App\Http\Controllers\AlumnoController::class, 'editalumno'])->name('editalumno');

Route::patch('/editalu/{id}',[App\Http\Controllers\AlumnoController::class, 'editalu'])->name('editalu');

Route::get('/formadmon',[App\Http\Controllers\AdministracionController::class, 'registro']);

Route::post('/saveadmon', [App\Http\Controllers\AdministracionController::class, 'saveadmon'])
->name('saveadmon');

Route::get('/listaradmon', [App\Http\Controllers\AdministracionController::class, 'listaradmon']);

Route::delete('/deleteadmon/{id}',[App\Http\Controllers\AdministracionController::class, 'deleteadmon'])->name('deleteadmon');

Route::get('/editadmon/{id}',[App\Http\Controllers\AdministracionController::class, 'editadmon'])->name('editadmon');

Route::patch('/editad/{id}',[App\Http\Controllers\AdministracionController::class, 'editad'])->name('editad');
