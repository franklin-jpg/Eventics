<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventBooking;
use App\Services\Paystack;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    public function show($slug)
    {

        $event = Event::with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // related events

        $relatedEvents = Event::where('event_category_id', $event->event_category_id)
            ->where('id', '!=', $event->id)
            ->where('status', 'published')
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->limit(3)
            ->get();
        return view('User.events.show', compact('event', 'relatedEvents'));
    }



    /**
     * Initialize payment for an event booking
     * This method creates a pending booking and redirects user to Paystack
     */


    public function pay(Request $request, Event $event)
    {
        try {
            // Check if user is authenticated
            if (!Auth::check()) {
                return redirect()->route('login')
                    ->with('url.intended', route('events.show', $event->slug));
            }

            // Validate ticket quantity
            $validated = $request->validate([
                'quantity' => 'required|integer|min:1|max:10',
            ], [
                'quantity.required' => 'Please select ticket quantity.',
                'quantity.integer' => 'Ticket quantity must be a valid number.',
                'quantity.min' => 'You must book at least 1 ticket.',
                'quantity.max' => 'You can book a maximum of 10 tickets at once.',
            ]);


            // Check if event is published
            if ($event->status !== 'published') {
                return redirect()->back()->with('error', 'This event is currently unavailable for booking.');
            }

            // Check if event date has passed
            if (now()->greaterThan($event->event_date)) {
                return redirect()->back()->with('error', 'This event has already passed.');
            }

            // Check if user has already booked this event
            $existingBooking = EventBooking::where('user_id', Auth::id())
                ->where('event_id', $event->id)
                ->whereIn('status', ['pending', 'confirmed'])
                ->first();


            if ($existingBooking) {
                return redirect()->back()->with('error', 'You have already booked this event.');
            }

            // Calculate total amount based on quantity
            $quantity = $validated['quantity'];
            $totalAmount = $event->ticket_price * $quantity;

            // Start database transaction
            DB::beginTransaction();



            // Create a pending booking
            $booking = EventBooking::create([
                'user_id' => Auth::id(),
                'event_id' => $event->id,
                'booking_reference' => EventBooking::generateBookingReference(),
                'quantity' => $quantity,
                'amount' => $totalAmount,
                'status' => 'pending',
            ]);

            // Prepare data for Paystack
            $paymentData = [
                'email' => Auth::user()->email,
                'amount' => $totalAmount,
                'booking_id' => $booking->id,
                'event_id' => $event->id,
                'event_title' => $event->title,
                'event_slug' => $event->slug,
                'quantity' => $quantity,
            ];

            // Initialize Paystack transaction
            $response = Paystack::initializeTransaction($paymentData);

            // Check if initialization was successful
            if ($response['status'] !== true) {
                throw new Exception($response['message'] ?? 'Failed to initialize payment.');
            }

            // Store booking ID in session for callback verification
            $request->session()->put('pending_booking_id', $booking->id);

            DB::commit();

            // Redirect user to Paystack payment page
            return redirect()->away($response['data']['authorization_url']);
        } catch (Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            Log::error('Payment initialization failed', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
                'event_id' => $event->id,
            ]);



            return redirect()->back()->with('error', 'Unable to process payment. Please try again.' . $e->getMessage());
        }
    }
}
