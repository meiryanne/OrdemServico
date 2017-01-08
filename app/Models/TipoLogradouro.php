<?php

namespace App\Models;

class TipoLogradouro extends BaseModel
{
    protected $table = 'tipo_logradouro';

    protected $primaryKey = 'cod_tl';

    protected $fillable = [
        'descricao',
    ];

    protected $searchable = [
        'descricao' => 'like',
    ];
}
