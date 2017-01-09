<?php

namespace App\Repositories;

use App\Models\Telefone;

class TelefoneRepository extends Repository
{
    public function __construct(Telefone $telefone)
    {
        $this->model = $telefone;
    }

    public function find($id)
    {
        return $this->model->where('cod_cl', $id)->first();
    }
}