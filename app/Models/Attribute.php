<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use CrudTrait;

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function options() {
        return $this->belongsToMany(Option::class)->withPivot(['product_id']);
    }
}
