<?php

namespace App\Repositories;

use App\Models\ProdutoServico;

class ProdutoServicoRepository extends Repository
{
    public function __construct(ProdutoServico $produtoServico)
    {
        $this->model = $produtoServico;
    }
}
