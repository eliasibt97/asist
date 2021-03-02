<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surnames');
            $table->string('cellphone',20);
            $table->string('phone',20)->nullable();
            $table->string('email')->unique();
            $table->integer('age',false,true);
            $table->string('address');
            $table->date('born_date');
            $table->string('birth_place');
            $table->date('baptism_date');
            $table->date('holy_spirit_receive_date');
            $table->string('status')->default('Activo');
            $table->string('observations')->nullable();

            $table->foreignId('group_id')->nullable()->constrained('groups');
            $table->foreignId('responsable_id')->constrained('responsables');

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
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign('group_id');
            $table->dropForeign('responsable_id');
        });
        Schema::dropIfExists('members');
    }
}
