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
            
            $table->double('valor_pagar')->unsigned()->nullable();
            $table->string('articulo')->nullable();
            $table->integer('plazo')->nullable();
            $table->double('pago_domingos')->nullable();
            $table->double('valor_seguro')->nullable();
            $table->double('valor_cuota');
            $table->string('estado')->nullable();
            $table->string('orden')->nullable();


            $table->foreign('cliente_id')
                ->references('id')
                ->on('personas')
                ->onUpdate('CASCADE');
                
            $table->foreign('cartera_id')
                ->references('id')
                ->on('carteras')
                ->onUpdate('CASCADE');
                

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
