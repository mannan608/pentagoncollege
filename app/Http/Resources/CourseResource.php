<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'price' => $this->price,
            'discount_percentage' => $this->discount_percentage,
            'final_price' => $this->final_price,
            'thumbnail' => $this->thumbnail,
            'description' => $this->description,
            'category' => $this->category?->name,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}