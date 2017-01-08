<?php

namespace App\Repositories;

use App\Models\PessoaJuridica;

class PessoaJuridicaRepository extends Repository
{
    public function __construct(PessoaJuridica $pessoaJuridica)
    {
        $this->model = $pessoaJuridica;
    }
}