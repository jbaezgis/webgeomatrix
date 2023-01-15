<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->integer('version')->nullable();
            $table->string('oficina')->nullable();
            $table->string('responsable')->nullable();
            $table->text('objetivos_actividades')->nullable();
            $table->text('estructura_organizativa')->nullable();
            $table->text('observaciones_generales')->nullable();
            $table->text('observaciones_medios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosticos');
    }
};
