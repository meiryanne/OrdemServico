<?php

namespace App\Models;

class Item extends BaseModel
{
    protected $table = 'itemorcamento';

    protected $primaryKey = 'cod_io';

    protected $fillable = [
        'cod_or',
        'cod_ps',
        'quantidade',
        'valor',
    ];

    protected $searchable = [
        'valor' => '=',
    ];
}
