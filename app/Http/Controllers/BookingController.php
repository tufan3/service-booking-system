<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Service;
use App\Repositories\BookingRepository;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }
    public function userBookings(Request $request)
    {
        $bookings = $this->bookingRepository->userBookings($request);

        return response()->json([
            'success' => true,
            'data' => $bookings,
        ]);
    }

    public function store(BookingRequest $request)
    {
        $check = Booking::where('service_id', $request->service_id)->where('booking_date', $request->booking_date)->first();
        if ($check) {
            return response()->json([
                'success' => false,
                'message' => 'Booking already exists',
            ], 400);
        }

        $booking = $this->bookingRepository->storeBooking($request);

        return response()->json([
            'success' => true,
            'data' => $booking,
            'message' => 'Booking created successfully',
        ], 201);
    }

    public function adminBookings(Request $request)
    {
        $bookings = $this->bookingRepository->adminBookings($request);

        return response()->json([
            'success' => true,
            'data' => $bookings,
        ]);
    }

    public function updateBookingStatus(Request $request, Booking $booking)
    {
        $booking = $this->bookingRepository->updateBookingStatus($request, $booking);

        return response()->json([
            'success' => true,
            'data' => $booking,
            'message' => 'Booking status updated successfully',
        ]);
    }
}
