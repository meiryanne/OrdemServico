<?php

namespace App\Models;

class PessoaJuridica extends BaseModel
{
    protected $table = 'juridica';

    protected $primaryKey = 'cod_jr';

    protected $fillable = [
        'cod_cl',
        'inscricao_estadual',
    ];

    protected $searchable = [
        'inscricao_estadual' => 'like',
    ];
}
