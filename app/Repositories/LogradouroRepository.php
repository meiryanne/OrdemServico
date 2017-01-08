<?php

namespace App\Repositories;

use App\Models\Logradouro;

class LogradouroRepository extends Repository
{
    public function __construct(Logradouro $logradouro)
    {
        $this->model = $logradouro;
    }
}