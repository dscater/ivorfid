<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_nom');
            $table->bigInteger('producto_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('precio_uni',24,2);
            $table->integer('cantidad')->unsigned();
            $table->string('descripcion',255)->nullable();
            $table->date('fecha_salida');
            $table->timestamps();

            $table->foreign('tipo_nom')->references('nom')->on('tipo_ingreso_salida')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salidas');
    }
}
