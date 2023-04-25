<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoRfidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_rfids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rfid')->unique();
            $table->bigInteger('producto_id')->unsigned();
            $table->enum('estado',['VENDIDO','ALMACEN','SALIDA']);
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
        Schema::dropIfExists('producto_rfids');
    }
}
