<?php

namespace App\Models;

class PessoaFisica extends BaseModel
{
    protected $table = 'fisica';

    protected $primaryKey = 'cod_fs';

    protected $fillable = [
        'cod_cl',
        'cpf',
        'rg',
    ];

    protected $searchable = [
        'cpf' => 'like',
    ];
}
