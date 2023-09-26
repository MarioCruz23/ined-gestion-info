<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class padreencargado extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'padre_encargado';

    public function alumno(){
        return $this->belongsTo(alumno::class, 'alumno_id');
    }
}
