<?php

use Illuminate\Database\Seeder;
use App\Models\UnidadeFederacao;

class UFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uf = new UnidadeFederacao();
        $uf->nome = "Acre";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Alagoas";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Amapá";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Amazonas";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Bahia";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Ceará";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Distrito Federal";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Espiríto Santo";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Goiás";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Maranhão";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Mato Grosso";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Mato Grosso do Sul";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Minas Gerais";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Paraná";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Paraíba";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Pará";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Pernambuco";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Piauí";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Rio de Janeiro";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Rio Grande do Norte";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Rio Grande do Sul";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Rondônia";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Roraima";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Santa Catarina";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Sergipe";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "São Paulo";
        $uf->save();

        $uf = new UnidadeFederacao();
        $uf->nome = "Tocantins";
        $uf->save();
    }
}
