<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJuridicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juridica', function (Blueprint $table) {
            $table->increments('cod_jr');

            $table->integer('cod_cl')->unsigned();

            $table->string('inscricao_estadual')->unique();

            $table->foreign('cod_cl')->references('cod_cl')->on('cliente')->onDelete('cascade');
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
        Schema::dropIfExists('juridica');
    }
}
