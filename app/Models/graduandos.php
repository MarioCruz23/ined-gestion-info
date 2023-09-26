<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class graduandos extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function pensum(){
        return $this->hasMany(pensum::class, 'pensum_id');
    }
}
