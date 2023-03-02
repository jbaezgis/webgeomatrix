<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Software;
use App\Models\Diagnostico;

class Recurso extends Model
{
    use HasFactory;

    protected $fillable = [
		"diagnostico_id", 
		"equipo", 
		"marca_modelo", 
		"capacidades", 
		"red_servidor", 
		"acceso_internet", 
		"personal_asignado", 
    ];

	public function diagnostico(){
        return $this->belongsTo(Diagnostico::class);
	}
    
    public function softwares(){
        return $this->hasMany(Software::class);
	}
}
