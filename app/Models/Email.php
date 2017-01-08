<?php

namespace App\Models;

class Email extends BaseModel
{
    protected $table = 'email';

    protected $primaryKey = 'cod_em';

    protected $fillable = [
        'cod_cl',
        'endereco',
        'tipo',
    ];

    protected $searchable = [
        'endereco' => 'like',
    ];
}
