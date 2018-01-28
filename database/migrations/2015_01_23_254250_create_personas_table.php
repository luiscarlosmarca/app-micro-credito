<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->integer('cedula')->unique();
            $table->string('celular')->nullable();
            $table->string('estado')->nullable();
            $table->string('direccion')->nullable();
            $table->enum('role', ['cliente', 'cobrador'])->nullable();
            $table->integer('cobrador_id')->unsigned()->nullable();

            $table->foreign('cobrador_id')->references('id')->on('personas');

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
        Schema::dropIfExists('personas');
    }
}
