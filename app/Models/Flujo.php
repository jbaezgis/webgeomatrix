<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Caracteristica;

class Flujo extends Model
{
    use HasFactory;

    protected $fillable = [
		"diagnostico_id", 
		"descripcion", 
    ];

    public function carateristicas(){
      return $this->hasMany(Caracteristica::class);
    }
}
