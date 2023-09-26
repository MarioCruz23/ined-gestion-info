<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class graduandos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'graduandos';

    public function pensum() {
        return $this->belongsTo(pensum::class, 'pensum_id');
    }
    
}
