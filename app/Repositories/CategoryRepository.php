<?php

namespace App\Repositories;

use App\Filters\CategoryFilter;
use App\Models\Category;

class CategoryRepository
{
    public function list($filters = [])
    {
        $query = Category::query();
        $query->applyFilters(new CategoryFilter, $filters);

        return $query->simplePaginate()->appends($filters);
    }
}
