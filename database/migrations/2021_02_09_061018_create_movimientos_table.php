<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('razon', 50);
            $table->enum('tipo', ['Ingreso','Egreso','Conversión'])->default('Ingreso');
            $table->date('fecha');
            $table->string('encargado',80);
            $table->string('iglesia',100);

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
        Schema::dropIfExists('movimientos');
    }
}
