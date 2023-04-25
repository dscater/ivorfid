<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('razon_social_p');
            $table->string('nit_pro_p');
            $table->string('numa_pro_p');
            $table->string('dir_dpto_p');
            $table->string('dir_ciudad_p');
            $table->string('dir_zv_p');
            $table->string('dir_ac_p');
            $table->string('dir_nro_p');
            $table->string('fono_p');
            $table->string('fono_alt_p')->nullable();
            $table->string('fax_p')->nullable();
            $table->string('email_p')->nullable();
            $table->string('web_p')->nullable();
            $table->string('logo_p');
            $table->string('nom_rep_p');
            $table->string('apep_rep_p');
            $table->string('apem_rep_p')->nullable();
            $table->string('cel_rep_p');
            $table->string('fecha_reg_p');
            $table->bigInteger('user_id')->unsigned();
            $table->integer('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->ondelete('no action')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedors');
    }
}
