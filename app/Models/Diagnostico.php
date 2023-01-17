<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dato;
use App\Models\Flujo;

class Diagnostico extends Model
{
    use HasFactory;
    protected $fillable = [
		"fecha", 
		"version", 
		"oficina", 
		"responsable", 
		"objetivos_actividades", 
		"estructura_organizativa", 
		"observaciones_generales", 
		"observaciones_medios", 
    ];
    
    public function flujos(){
        return $this->hasMany(Flujo::class);
	}

}
