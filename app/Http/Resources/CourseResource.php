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
            'name' => $this->name,
            'code' => $this->code,
            'cricos' => $this->cricos,
            'slug' => $this->slug,
            'price' => $this->price,
            'discount_percentage' => $this->discount_percentage,
            'final_price' => $this->final_price,
            'thumbnail' => $this->thumbnail,
            'overview' => $this->overview,
            'entry_requirements' => $this->entry_requirements,
            'description' => $this->description,
            'course_material' => $this->course_material,
            'status' => $this->status,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}