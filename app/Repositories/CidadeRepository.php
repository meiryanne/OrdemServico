<?php

namespace App\Repositories;

use App\Models\Cidade;

class CidadeRepository extends Repository
{
    public function __construct(Cidade $cidade)
    {
        $this->model = $cidade;
    }
}