<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemOrcamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemorcamento', function (Blueprint $table) {
            $table->increments('cod_io');

            $table->integer('cod_or')->unsigned();
            $table->integer('cod_ps')->unsigned();

            $table->integer('quantidade');
            $table->float('valor');

            $table->foreign('cod_or')->references('cod_or')->on('orcamento');
            $table->foreign('cod_ps')->references('cod_ps')->on('produtoservico');

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
        Schema::dropIfExists('itemorcamento');
    }
}
