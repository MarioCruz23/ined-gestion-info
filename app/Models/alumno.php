<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumno extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public function padres(){
        return $this->hasMany(padreencargado::class, 'alumno_id');
    }
    public function inscripcion(){
        return $this->hasMany(inscripcion::class, 'alumno_id');
    }
}
