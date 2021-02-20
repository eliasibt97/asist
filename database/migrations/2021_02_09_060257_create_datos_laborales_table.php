<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosLaboralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_laborales', function (Blueprint $table) {
            $table->id();
            $table->string('profesion_oficio',100);
            $table->string('lugar_trajo',50);
            $table->string('empresa_trajo',50);
            $table->string('horario',50);

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
        Schema::dropIfExists('datos_laborales');
    }
}
