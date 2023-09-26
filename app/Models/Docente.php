<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $table = 'docente';
    public function admon(){
        return $this->hasMany(Administración::class, 'docente_id');
    }
}
