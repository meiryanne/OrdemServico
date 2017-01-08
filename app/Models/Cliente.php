<?php

namespace App\Models;

class Cliente extends BaseModel
{
    protected $table = 'cliente';

    protected $primaryKey = 'cod_cl';

    protected $fillable = [
        'nome',
    ];

    protected $searchable = [
        'nome' => 'like',
    ];
}
