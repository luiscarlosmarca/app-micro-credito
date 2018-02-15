<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prestamo_id')->unsigned()->nullable();
            $table->double('valor');
            $table->string('observaciones')->nullable();
            
            $table->foreign('prestamo_id')
                ->references('id')
                ->on('prestamos')
                ->onDelete('SET NULL')
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
        Schema::dropIfExists('cobros');
    }
}
