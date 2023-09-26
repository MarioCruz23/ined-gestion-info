<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'curso';

    public function pensum(){
        return $this->belongsTo(pensum::class, 'pensum_id');
    }
}
