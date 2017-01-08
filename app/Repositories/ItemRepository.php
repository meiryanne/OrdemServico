<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository extends Repository
{
    public function __construct(Item $item)
    {
        $this->model = $item;
    }
}
