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
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->integer('diagnostico_id')->nullable();
            $table->string('equipo')->nullable();
            $table->string('marca_modelo')->nullable();
            $table->string('capacidades')->nullable();
            $table->boolean('red_servidor')->nullable();
            $table->boolean('acceso_internet')->nullable();
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
        Schema::dropIfExists('recursos');
    }
};
