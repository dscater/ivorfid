<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cod')->unique();
            $table->string('nom');
            $table->decimal('precio',24,2);
            $table->string('descripcion');
            $table->string('imagen');
            $table->bigInteger('tipo_id')->unsigned();
            $table->bigInteger('medida_id')->unsigned();
            $table->bigInteger('marca_id')->unsigned();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->date('fecha_reg');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipos')->ondelete('no action')->onupdate('cascade');
            $table->foreign('medida_id')->references('id')->on('medidas')->ondelete('no action')->onupdate('cascade');
            $table->foreign('marca_id')->references('id')->on('marcas')->ondelete('no action')->onupdate('cascade');
            $table->foreign('proveedor_id')->references('id')->on('proveedors')->ondelete('no action')->onupdate('cascade');
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
        Schema::dropIfExists('productos');
    }
}
