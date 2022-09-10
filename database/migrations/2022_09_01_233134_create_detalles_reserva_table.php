<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_reserva', function (Blueprint $table) {
            $table->id();
            $table->decimal('subtotal_cuota_inicial',18,4);
            $table->unsignedBigInteger('terreno_id');
            $table->unsignedBigInteger('reserva_id');
            $table->timestamps();

            $table->foreign('terreno_id')->references('id')->on('terrenos');
            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_reserva');
    }
}
