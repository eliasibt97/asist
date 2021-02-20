<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento',100);
            $table->tinyInteger('edad');
            $table->string('telefono_fijo',20)->nullable();
            $table->string('celular',20);
            $table->string('correo',30)->nullable();
            $table->string('direccion',150);
            $table->date('fecha_espiritu_santo')->nullable();
            $table->date('fecha_bautismo');
            $table->enum('estatus', array('activo','inactivo'));
            $table->string('observaciones',150);
            $table->string('image');
            
            /**Foreign Columns */
            $table->unsignedBigInteger('id_grupo');
            $table->unsignedBigInteger('id_responsable');

            /**Foreign Keys Columns */
            $table->foreign('id_grupo')->references('id')->on('grupos');
            $table->foreign('id_responsable')->references('id')->on('responsables');

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
        Schema::dropIfExists('miembros');
    }
}
