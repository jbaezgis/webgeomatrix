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
        Schema::create('software', function (Blueprint $table) {
            $table->id();
            $table->integer('recurso_id')->nullable();
            $table->string('aplicacion')->nullable();
            $table->string('desarrollador')->nullable();
            $table->string('tipo_licencia')->nullable();
            $table->string('uso')->nullable();
            $table->string('frecuencia_uso')->nullable();
            $table->string('personal_asignado')->nullable();
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
        Schema::dropIfExists('software');
    }
};
