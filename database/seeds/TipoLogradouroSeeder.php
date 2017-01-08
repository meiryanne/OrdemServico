<?php

use Illuminate\Database\Seeder;
use App\Models\TipoLogradouro;


class TipoLogradouroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new TipoLogradouro();
        $tipo->descricao = "Rua";
        $tipo->save();

        $tipo = new TipoLogradouro();
        $tipo->descricao = "Avenida";
        $tipo->save();

        $tipo = new TipoLogradouro();
        $tipo->descricao = "Alameda";
        $tipo->save();

        $tipo = new TipoLogradouro();
        $tipo->descricao = "Conjunto";
        $tipo->save();

        $tipo = new TipoLogradouro();
        $tipo->descricao = "Quadra";
        $tipo->save();

        $tipo = new TipoLogradouro();
        $tipo->descricao = "Loteamento";
        $tipo->save();

        $tipo = new TipoLogradouro();
        $tipo->descricao = "Parque";
        $tipo->save();

        $tipo = new TipoLogradouro();
        $tipo->descricao = "Condomínio";
        $tipo->save();

        $tipo = new TipoLogradouro();
        $tipo->descricao = "Rodovia";
        $tipo->save();

        $tipo = new TipoLogradouro();
        $tipo->descricao = "Recanto";
        $tipo->save();

        $tipo = new TipoLogradouro();
        $tipo->descricao = "Residencial";
        $tipo->save();
    }
}
