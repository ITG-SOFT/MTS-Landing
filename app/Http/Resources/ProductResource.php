<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'photo' => $this->getPhoto(),
            'category' => $this->category,
            'company' => $this->company,
            'attributes' => $this->category->attributes,
            'attribute_values' => AttributeValueResource::collection($this->attributeValues),
            'price' => $this->getPrice(),
            'sale_price' => $this->getSalePrice(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
