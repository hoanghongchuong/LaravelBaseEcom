<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getAllCategory() {
        return $this->get();
    }
}
