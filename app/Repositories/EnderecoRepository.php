<?php

namespace App\Repositories;

use App\Models\Endereco;

class EnderecoRepository extends Repository
{
    public function __construct(Endereco $endereco)
    {
        $this->model = $endereco;
    }

    public function find($id)
    {
        return $this->model->where('cod_cl', $id)->first();
    }

}
