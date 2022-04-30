<?php

namespace App\Repositories;

use App\Filters\ProductFilter;
use App\Models\Product;

class ProductRepository
{
    public function create($data) {
        return Product::query()->create($data);
    }

    public function list($filters) {
        $query = Product::query();
        $query->applyFilters(new ProductFilter, $filters);

        return $query->paginate();
    }
}
