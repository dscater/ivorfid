<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DetalleVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad')->unsigned();
            $table->decimal('precio_uni',24,2);
            $table->decimal('subtotal',24,2);
            $table->decimal('precio_final',24,2);
            $table->string('descuento_sim',50);
            $table->bigInteger('venta_id')->unsigned();
            $table->bigInteger('producto_id')->unsigned();
            $table->timestamps();

            $table->foreign('descuento_sim')->references('simbolo')->on('descuentos')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('no action')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_ventas');
    }
}
