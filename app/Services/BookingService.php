<?php

namespace App\Services;

use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Resources\BookingResource;
use App\Interfaces\BookingRepositoryInterface;
use App\Models\Booking;
use App\Models\Product;
use App\Traits\ResponseAPI;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class BookingService implements BookingRepositoryInterface
{

    use ResponseAPI;

    public function getBookingById($id): Booking
    {
        return Booking::whereId($id)->first();
    }

    public function getAllBooking(): Collection
    {
        return Booking::all();
    }

    public function store(CreateBookingRequest $request): JsonResponse
    {
        $product_id = $request->product_id;
        $client_id = $request->client_id;
        $product = Product::whereId($product_id)->first();

        if ($product->getIsAvailableAttribute() === false) {
            return $this->error("No slots available for the selected Products", 404);
        }
        $booking = new Booking();
        $booking->client_id = $client_id;
        $booking->product_id = $product_id;
        $booking->booked_on = now();
        $booking->save();


        $bookingResource = new BookingResource($booking);
        return $this->success('Booking Created Successfully', $bookingResource);
    }

    public function updateBooking(UpdateBookingRequest $request)
    {
        // TODO: Implement updateBooking() method.
    }
}
