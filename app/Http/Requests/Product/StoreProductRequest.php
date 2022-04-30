<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function rules() {
        return [
            'name'          => 'required',
            'description'   => 'required',
            'images'        => 'nullable|array',
            'images.*'      => 'nullable|file',
        ];
    }
}
