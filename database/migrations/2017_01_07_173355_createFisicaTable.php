<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFisicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fisica', function (Blueprint $table) {
            $table->increments('cod_fs');

            $table->integer('cod_cl')->unsigned();

            $table->string('cpf')->unique();
            $table->string('rg')->unique();

            $table->foreign('cod_cl')->references('cod_cl')->on('cliente');
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
        Schema::dropIfExists('fisica');
    }
}
