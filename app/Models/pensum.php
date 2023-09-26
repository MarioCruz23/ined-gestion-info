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
    public function curso(){
        return $this->hasMany(curso::class, 'pensum_id');
    }
    public function graduandos(){
        return $this->hasMany(graduandos::class, 'pensum_id');
    }
}
