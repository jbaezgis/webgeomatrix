<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flujo;

class Caracteristica extends Model
{
    use HasFactory;

    protected $fillable = [
		"flujo_id", 
		"entrada_proveedor", 
		"tratamiento", 
		"salida_cliente", 
		"sig",
		"comentario",
    ];

	public function flujo(){
        return $this->belongsTo(Flujo::class);
	}
}
