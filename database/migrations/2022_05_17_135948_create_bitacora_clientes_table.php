<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacoraClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_clientes', function (Blueprint $table) {
            $table->id();
            $table->json('sesion');
            $table->string('ip', 30);
            $table->string('url', 500);
            $table->string('path', 300);
            $table->string('metodo', 100);
            $table->unsignedBigInteger('user_id');
            $table->string('usuario', 300);
            $table->json('data');
            $table->string('accion');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_clientes');
    }
}
