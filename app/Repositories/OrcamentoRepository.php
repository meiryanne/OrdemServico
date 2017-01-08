<?php

namespace App\Repositories;

use App\Models\Orcamento;

class OrcamentoRepository extends Repository
{
    public function __construct(Orcamento $orcamento)
    {
        $this->model = $orcamento;
    }
}
