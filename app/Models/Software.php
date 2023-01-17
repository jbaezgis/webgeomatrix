<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recurso;

class Software extends Model
{
    use HasFactory;

    protected $fillable = [
		"recurso_id", 
		"aplicacion", 
		"desarrollador", 
		"tipo_licencia", 
		"uso", 
		"frecuencia_uso", 
		"personal_asignado", 
    ];

    public function recurso(){
        return $this->belongsTo(Recurso::class);
	}
}
