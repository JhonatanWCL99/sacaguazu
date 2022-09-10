<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->date('fecha');
            $table->decimal('total',18,4);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('tipo_pago_id');
            $table->unsignedBigInteger('promocion_id')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('tipo_pago_id')->references('id')->on('tipos_pagos');
            $table->foreign('promocion_id')->references('id')->on('promociones');
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
