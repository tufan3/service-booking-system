<?php

namespace App\Repositories;

use App\Models\Booking;

class BookingRepository
{
    public function userBookings($request)
    {
        return Booking::with(['user', 'service'])
            ->where('user_id', auth()->user()->id)
            ->orderBy('booking_date', 'desc')
            ->get();
    }

    public function storeBooking($request){
        $booking = new Booking();
        $booking->user_id = auth()->user()->id;
        $booking->service_id = $request->service_id;
        $booking->booking_date = $request->booking_date;
        $booking->status = 'pending';
        $booking->save();
        return $booking;
    }

    public function adminBookings($request){
        $query = Booking::with(['user', 'service']);

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('date_from')) {
            $query->where('booking_date', '>=', $request->date_from);
        }

        if ($request->has('date_to')) {
            $query->where('booking_date', '<=', $request->date_to);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(15);

        return $bookings;
    }

    public function updateBookingStatus($request, $booking){
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $booking->update(['status' => $request->status]);
        return $booking;
    }

}
