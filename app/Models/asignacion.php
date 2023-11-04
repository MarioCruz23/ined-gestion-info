<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Docente;
use App\Models\curso;

class asignacion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'asignacion_cursodocente';

    public function docente(){
        return $this->belongsTo(Docente::class, 'docente_id');
    }
    public function curso(){
        return $this->belongsTo(curso::class, 'curso_id');
    }
}
