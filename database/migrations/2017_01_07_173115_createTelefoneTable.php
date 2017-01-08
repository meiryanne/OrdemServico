<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefone', function (Blueprint $table) {
            $table->increments('cod_tf');
            $table->integer('cod_cl')->unsigned();
            $table->string('descricao', 45)->default('');
            $table->string('numero', 20)->default('');
            $table->string('tipo', 20)->default('');

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
        Schema::dropIfExists('telefone');
    }
}
