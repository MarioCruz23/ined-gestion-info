<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscripcion extends Model
{
    use HasFactory;
    public function alumno(){
        return $this->belongsTo(alumno::class, 'alumno_id');
    }    
    protected $table = 'inscripcion';
}
