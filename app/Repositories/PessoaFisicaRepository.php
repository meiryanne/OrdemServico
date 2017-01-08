<?php

namespace App\Repositories;

use App\Models\PessoaFisica;

class PessoaFisicaRepository extends Repository
{
    public function __construct(PessoaFisica $pessoaFisica)
    {
        $this->model = $pessoaFisica;
    }
}