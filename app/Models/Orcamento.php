<?php

namespace App\Models;

class Orcamento extends BaseModel
{
    protected $table = 'orcamento';

    protected $primaryKey = 'cod_or';

    protected $fillable = [
        'cod_cl',
        'data',
        'valor',
    ];

    protected $searchable = [
        'valor' => '=',
    ];
}
