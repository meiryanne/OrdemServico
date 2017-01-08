<?php

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use Faker\Factory;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 50; $i++){
            $cliente = new Cliente();
            $cliente->nome = $faker->name;
            $cliente->save();
        }
    }
}
