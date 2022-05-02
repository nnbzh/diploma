<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class GetProductsRequest extends FormRequest
{
    public function rules() {
        return [
            'category_id' => 'nullable|int|exists:categories,id'
        ];
    }
}
