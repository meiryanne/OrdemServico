<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrcamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orcamento', function (Blueprint $table) {
            $table->increments('cod_or');

            $table->integer('cod_cl')->unsigned();

            $table->date('data');
            $table->float('valor')->default(0);

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
        Schema::dropIfExists('orcamento');
    }
}
