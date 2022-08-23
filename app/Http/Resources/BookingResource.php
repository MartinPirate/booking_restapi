<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'client' => $this->client->getFullNameAttribute(),
            'product' => $this->product->title,
            'booked_date' => ($this->booked_on)->format('Y.m.d H:i:s'),
            'created_date' => ($this->created_at)->format('Y.m.d H:i:s'),
            'last_updated_date' => ($this->updated_at)->format('Y.m.d H:i:s'),
        ];
    }
}
