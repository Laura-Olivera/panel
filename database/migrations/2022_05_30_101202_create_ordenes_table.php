<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->string('clave_order')->unique();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('direccion_id');
            $table->unsignedBigInteger('pago_id');
            $table->double('total', 8, 2);
            $table->integer('envio_estatus');
            $table->integer('order_estatus');
            $table->bigIncrements('consecutivo');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('direccion_id')->references('id')->on('direcciones');
            $table->foreign('pago_id')->references('id')->on('metodo_pago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes');
    }
}
