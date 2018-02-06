<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('cartera_id')->unsigned()->nullable();
            $table->integer('cobrador_id')->unsigned()->nullable();
            $table->integer('cliente_id')->unsigned()->nullable();
            $table->double('valor')->unsigned()->nullable();
            $table->string('articulo');
            $table->string('plazo');
            $table->double('pago_domingos');
            $table->double('valor_seguro');
            $table->double('valor_cuota');
            $table->string('estado');
            $table->double('saldo');

            $table->foreign('cobrador_id')->references('id')->on('personas');
            $table->foreign('cliente_id')->references('id')->on('personas');
            $table->foreign('cartera_id')->references('id')->on('carteras');
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
        Schema::dropIfExists('prestamos');
    }
}
