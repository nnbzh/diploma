<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    public function creating(Category $category) {
        $category->slug = \Str::slug($category->name);
    }

    public function updated(Category $category) {
        if ($category->wasChanged('name')) {
            $category->slug = \Str::slug($category->name);
        }
    }
}
