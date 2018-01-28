<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarteraPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartera_persona', function (Blueprint $table) {

            $table->integer('persona_id')->unsigned();

            $table->foreign('persona_id')->references('id')->on('personas');

            $table->integer('cartera_id')->unsigned();

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
        Schema::dropIfExists('cartera_persona');
    }
}
