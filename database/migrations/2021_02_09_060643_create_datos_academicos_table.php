<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_academicos', function (Blueprint $table) {
            $table->id();
            $table->boolean('primaria')->default(false);
            $table->boolean('secundaria')->default(false);
            $table->boolean('preparatoria')->default(false);
            $table->boolean('universidad')->default(false);
            $table->string('estudio_actual',100);
            $table->string('lugar_estudio', 100);
            $table->string('horario');

            $table->unsignedBigInteger('id_miembro');
            $table->foreign('id_miembro')->references('id')->on('miembros');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_academicos');
    }
}
