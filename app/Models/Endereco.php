<?php

namespace App\Models;

class Endereco extends BaseModel
{
    protected $table = 'endereco';

    protected $primaryKey = 'cod_ed';

    protected $fillable = [
        'cod_cl',
        'cod_cd',
        'cod_br',
        'cod_tl',
        'cod_lg',
        'numero',
        'complemento',
        'tipo_endereco',
    ];

    protected $searchable = [
        'numero' => '=',
        'complemento' => 'like',
    ];
}
