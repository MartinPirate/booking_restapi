<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'description' => $this->description,
            'total_slots' => $this->capacity,
            'available_slots' => $this->getAvailableSlots(),
            'is_available' => $this->getIsAvailableAttribute(),
            'created_date' =>  ($this->created_at)->format('Y.m.d H:i:s'),
            'last_updated_date' =>($this->updated_at)->format('Y.m.d H:i:s'),

        ];

    }

    public function getAvailableSlots()
    {
        $slots = 0;
        if ($this->getIsAvailableAttribute()) {
            $slots = $this->capacity - $this->bookings->count();
        }
        return $slots;
    }
}
