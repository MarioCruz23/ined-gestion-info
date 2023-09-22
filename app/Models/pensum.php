<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pensum extends Model
{
    use HasFactory;
    protected $table = 'pensum';

    protected $fillable = [
        'nombre',
        'archivopensum',
    ];
    public $timestamps = false;
}
