<?php


namespace App\Repositories;

use App\Models\Cliente;

class ClienteRepository extends Repository
{
    public function __construct(Cliente $cliente)
    {
        $this->model = $cliente;
    }
}
