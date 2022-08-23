<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookingRequest;
use App\Http\Resources\BookingResource;
use App\Interfaces\BookingRepositoryInterface;
use App\Models\Booking;
use App\Models\Product;
use App\Traits\ResponseAPI;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{

    use ResponseAPI;

    private BookingRepositoryInterface $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Get a List of all Bookings
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $bookings = $this->bookingRepository->getAllBooking();

        $bookings = BookingResource::collection($bookings);

        return $this->success('List of All Bookings', $bookings);
    }

    /**
     * @param CreateBookingRequest $request
     * @return JsonResponse
     */
    public function store(CreateBookingRequest $request): JsonResponse
    {

     return $this->bookingRepository->store($request);
    }


}
