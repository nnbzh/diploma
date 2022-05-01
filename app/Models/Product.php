<?php

namespace App\Models;

use App\Traits\HasFilters;
use App\Traits\Imageable;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Imageable, HasFilters, CrudTrait;

    protected $fillable = [
        'name',
        'user_id',
        'description'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function attributes() {
        return $this->belongsToMany(Attribute::class, 'product_attribute');
    }
}
