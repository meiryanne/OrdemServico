<?php

namespace App\Models;

class Bairro extends BaseModel
{
    protected $table = 'bairro';

    protected $primaryKey = 'cod_br';

    protected $fillable = [
        'descricao',
    ];

    protected $searchable = [
        'descricao' => 'like',
    ];
}
