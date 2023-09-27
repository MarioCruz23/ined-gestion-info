<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asignacion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'asignacion_cursodocente';

    public function docente(){
        return $this->belongsTo(docente::class, 'docente_id');
    }
    public function curso(){
        return $this->belongsTo(curso::class, 'curso_id');
    }
}
