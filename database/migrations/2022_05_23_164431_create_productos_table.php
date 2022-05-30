<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('clave_producto');
            $table->string('nombre');
            $table->string('descrip_corta');
            $table->integer('stock');
            $table->integer('sales');
            $table->double('p_compra', 8, 2);
            $table->double('p_venta', 8, 2);
            $table->double('p_mayor', 8, 2);
            $table->double('p_dist', 8, 2);
            $table->integer('created_user_id');
            $table->integer('updated_user_id');
            $table->timestamps();
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
