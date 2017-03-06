<?php

namespace App\Repositories;

use App\Models\UnidadeFederacao;

class UnidadeFederacaoRepository extends Repository
{
    public function __construct(UnidadeFederacao $unidadeFederacao)
    {
        $this->model = $unidadeFederacao;
    }
}
