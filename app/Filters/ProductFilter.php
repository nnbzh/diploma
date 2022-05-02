<?php

namespace App\Filters;

use App\Filters\Base\ModelFilter;

class ProductFilter extends ModelFilter
{
    public function category_id($value) {
        $this->builder->where('category_id', $value);
    }
}
