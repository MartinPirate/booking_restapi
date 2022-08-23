<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->getFullNameAttribute(),
            'email' => $this->email,
            'passport_num' => $this->passport_num,
            'created_date' =>  ($this->created_at)->format('Y.m.d H:i:s'),
            'last_updated_date' =>($this->updated_at)->format('Y.m.d H:i:s'),
            'bookings' => $this->getClientsBooking()
        ];
    }

    public function getClientsBooking()
    {
        return $this->bookings->count();
    }
}
