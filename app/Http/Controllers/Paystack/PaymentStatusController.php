<?php

namespace App\Http\Controllers\Paystack;

use App\Http\Controllers\Controller;
use App\Models\EventBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentStatusController extends Controller
{
    /**
     * Show payment success page
     * Displays booking confirmation details
     */
    public function success(Request $request, $bookingId)
    {

        // Get the booking with related event and transaction
        $booking = EventBooking::with(['event.category', 'transaction'])
            ->where('id', $bookingId)
            ->where('user_id', Auth::id()) // Ensure user owns this booking
            ->firstOrFail();

        return view('User.payments.success', [
            'booking' => $booking,
            'event' => $booking->event,
            'transaction' => $booking->transaction,
        ]);
    }


    /**
     * Show user's bookings
     */
    public function index()
    {
        $bookings = EventBooking::with(['event', 'transaction'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('user.bookings.index', compact('bookings'));
    }
}