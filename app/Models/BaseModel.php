<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stevebauman\EloquentTable\TableTrait;

/**
 * Class BaseModel
 * @package App\Models
 * @author Lucas S. Vieira
 */
class BaseModel extends Model
{
    use TableTrait;

    protected $searchable = [];

    protected $primaryKey = 'id';

    public static function boot()
    {
        parent::boot();
    }

    public function searchable()
    {
        return $this->searchable;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function getTable()
    {
        return $this->table;
    }
}
