<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administracion extends Model
{
    use HasFactory;
    protected $table = 'administración';

    protected $fillable = [
        'codigoadmon',
        'nombreact',
        'fecha',
        'descripcion',
        'archivo',
    ];
    public $timestamps = false;
}
