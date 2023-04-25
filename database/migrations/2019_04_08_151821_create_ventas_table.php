<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('pago_total',24,2);
            $table->decimal('pago_venta',24,2);
            $table->date('fecha');
            $table->string('num_factura');
            $table->string('codigo',255);
            $table->string('codigo_qr',2048);
            $table->string('observacion',255);
            $table->integer('estado');
            $table->date('fecha_venta');
            $table->date('fecha_lim_emi');
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('cliente_id')->unsigned();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('no action')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
