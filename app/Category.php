<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
        'slug'
    ];

    public function getAllCategory()
    {
        return $this->get();
    }

    public function getCategoryPaginate()
    {
        $query = $this->paginate(5);
        return $query;
    }
}
