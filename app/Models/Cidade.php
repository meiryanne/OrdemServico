<?php

namespace App\Models;

class Cidade extends BaseModel
{
    protected $table = 'cidade';

    protected $primaryKey = 'cod_cd';

    protected $fillable = [
        'cod_uf',
        'nome',
    ];

    protected $searchable = [
        'nome' => 'like',
    ];
}
