<?php

namespace App\Models;

use App\Traits\HasFilters;
use App\Traits\Imageable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Imageable, HasFilters;

    protected $fillable = [
        'name'
    ];
}
