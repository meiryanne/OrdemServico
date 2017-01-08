<?php

namespace App\Models;

class Logradouro extends BaseModel
{
    protected $table = 'logradouro';

    protected $primaryKey = 'cod_lg';

    protected $fillable = [
        'descricao',
    ];

    protected $searchable = [
        'descricao' => 'like',
    ];
}
