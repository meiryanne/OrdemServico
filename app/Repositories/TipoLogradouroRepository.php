<?php

namespace App\Repositories;

use App\Models\TipoLogradouro;

class TipoLogradouroRepository extends Repository
{
    public function __construct(TipoLogradouro $tipoLogradouro)
    {
        $this->model = $tipoLogradouro;
    }
}
