<?php

namespace App\Repositories;

use App\Models\PessoaFisica;

class PessoaFisicaRepository extends Repository
{
    public function __construct(PessoaFisica $pessoaFisica)
    {
        $this->model = $pessoaFisica;
    }

    public function find($id)
    {
        return $this->model->where('cod_cl', $id)->first();
    }
}
