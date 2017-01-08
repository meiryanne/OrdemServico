<?php

namespace App\Models;

class UnidadeFederacao extends BaseModel
{
    protected $table = 'unidade_federacao';

    protected $primaryKey = 'cod_uf';

    protected $fillable = [
        'nome',
    ];

    protected $searchable = [
        'nome' => 'like',
    ];
}
