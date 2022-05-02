<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use CrudTrait, HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'value'
    ];
}
