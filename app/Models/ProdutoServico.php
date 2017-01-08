<?php

namespace App\Models;

class ProdutoServico extends BaseModel
{
    protected $table = 'produtoservico';

    protected $primaryKey = 'cod_ps';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'definicao',
    ];

    protected $searchable = [
        'preco' => '=',
    ];
}
