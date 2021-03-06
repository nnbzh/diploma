<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'price'         => $this->price,
            'description'   => $this->description,
            'category'      => new CategoryResource($this->category),
            'attributes'    => AttributeResource::collection($this->attributes),
            'images'        => ImageResource::collection($this->images),
        ];
    }
}
