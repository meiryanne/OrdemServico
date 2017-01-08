<?php

namespace App\Repositories;

use App\Models\Bairro;

class BairroRepository extends Repository
{
    public function __construct(Bairro $bairro)
    {
        $this->model = $bairro;
    }
}
