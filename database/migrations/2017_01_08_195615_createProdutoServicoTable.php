<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutoServicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtoservico', function (Blueprint $table) {
            $table->increments('cod_ps');

            $table->string('nome')->default('');
            $table->string('descricao')->default('');
            $table->float('preco');
            $table->enum('definicao', ['servico', 'produto']);

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
        Schema::dropIfExists('produtoservico');
    }
}
