<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function options() {
        return $this->belongsToMany(Option::class)->withPivot(['product_id']);
    }
}
