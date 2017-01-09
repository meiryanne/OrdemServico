<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->increments('cod_ed');

            $table->integer('cod_cl')->unsigned();
            $table->integer('cod_cd')->unsigned();
            $table->integer('cod_br')->unsigned();
            $table->integer('cod_tl')->unsigned();
            $table->integer('cod_lg')->unsigned();

            $table->string('numero');
            $table->string('complemento');
            $table->string('tipo_endereco');

            $table->foreign('cod_cl')->references('cod_cl')->on('cliente');
            $table->foreign('cod_cd')->references('cod_cd')->on('cidade');
            $table->foreign('cod_br')->references('cod_br')->on('bairro');
            $table->foreign('cod_tl')->references('cod_tl')->on('tipo_logradouro');
            $table->foreign('cod_lg')->references('cod_lg')->on('logradouro');

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
        Schema::dropIfExists('endereco');
    }
}
