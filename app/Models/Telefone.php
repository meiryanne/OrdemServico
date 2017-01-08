<?php

namespace App\Models;

class Telefone extends BaseModel
{
    protected $table = 'telefone';

    protected $primaryKey = 'cod_tf';

    protected $fillable = [
        'cod_cl',
        'descricao',
        'numero',
        'tipo',
    ];

    protected $searchable = [
        'descricao' => 'like',
    ];
}
