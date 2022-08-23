<?php

namespace App\Interfaces;

use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface BookingRepositoryInterface
{


    /**
     * @param $id
     * @return Booking
     */
    public function getBookingById($id) : Booking;

    /**
     * @return Collection
     */
    public function getAllBooking() : Collection;

    /**
     * @param CreateBookingRequest $request
     * @return JsonResponse
     */
    public function store(CreateBookingRequest $request) : JsonResponse;


    public function updateBooking(UpdateBookingRequest $request);

}
