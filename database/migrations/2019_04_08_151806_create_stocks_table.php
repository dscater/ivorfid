<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cant_ingresos')->unsigned();
            $table->integer('cant_actual')->unsigned();
            $table->integer('cant_salidas')->unsigned();
            $table->integer('cant_min')->unsigned();
            $table->date('fecha_movimiento');
            $table->date('fecha_reg');
            $table->bigInteger('producto_id')->unsigned();
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
