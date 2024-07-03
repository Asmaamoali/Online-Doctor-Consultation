<?php

namespace App\Http\Resources\Symptom;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowSymptomResource extends JsonResource
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
            'name' => $this->name,
            'subCategory' => $this->subCategory->name,
            'medicines' => $this->medicines->map(function ($medicine) {
                return [
                    'id' => $medicine->id,
                    'name' => $medicine->name,
                    'description' => $medicine->description,
                    'instructions' => $medicine->instructions,
                    'image' => displayImage($medicine->image),
                ];
            }),
        ];
    }
}
