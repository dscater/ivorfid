<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_u');
            $table->string('apep_u');
            $table->string('apem_u')->nullable();
            $table->string('ci_u');
            $table->string('ci_exp_u');
            $table->string('fecha_nac_u');
            $table->string('genero_u');
            $table->string('dir_dpto_u');
            $table->string('dir_ciudad_u');
            $table->string('dir_zv_u');
            $table->string('dir_ac_u');
            $table->string('dir_num_u');
            $table->string('fono_u')->nullable();
            $table->string('cel_u');
            $table->string('email_u')->nullable();
            $table->string('foto_u');
            $table->date('fecha_reg');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onCascade('update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_usuarios');
    }
}
