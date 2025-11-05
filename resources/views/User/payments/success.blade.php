@extends('layouts.user')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <!-- Success Icon -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-4">
                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Payment Successful!</h1>
            <p class="text-gray-600">Your booking has been confirmed</p>
        </div>

        <!-- Booking Details Card -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-xl font-bold mb-4 pb-2 border-b">Booking Details</h2>

            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Booking Reference:</span>
                    <span class="font-semibold">{{ $booking->booking_reference }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-600">Event:</span>
                    <span class="font-semibold">{{ $event->title }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-600">Date:</span>
                    <span class="font-semibold">{{ \Carbon\Carbon::parse($event->event_date)->format('F j, Y - g:i A') }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-600">Location:</span>
                    <span class="font-semibold">{{ $event->location }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-600">Tickets:</span>
                    <span class="font-semibold">{{ $booking->quantity }} {{ $booking->quantity > 1 ? 'Tickets' : 'Ticket' }}</span>
                </div>

                <div class="flex justify-between pt-3 border-t">
                    <span class="text-gray-600">Amount Paid:</span>
                    <span class="font-bold text-green-600 text-xl">₦{{ number_format($booking->amount, 2) }}</span>
                </div>

                @if($transaction)
                <div class="flex justify-between">
                    <span class="text-gray-600">Transaction Ref:</span>
                    <span class="font-mono text-sm">{{ $transaction->transaction_reference }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-600">Payment Method:</span>
                    <span class="font-semibold">{{ $transaction->channel ?? 'Paystack' }}</span>
                </div>
                @endif
            </div>
        </div>

        <!-- Important Information -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
            <h3 class="font-bold text-blue-800 mb-2">Important Information</h3>
            <ul class="text-blue-700 text-sm space-y-1">
                <li>• A confirmation email has been sent to your registered email address</li>
                <li>• Please keep your booking reference for entry to the event</li>
                <li>• You can view all your bookings in your account dashboard</li>
            </ul>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-4">
            <a href="{{ route('user.bookings.index') }}"
               class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200">
                View My Bookings
            </a>
            <a href="{{ route('events.show', $event->slug) }}"
               class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg text-center transition duration-200">
                Back to Event
            </a>
        </div>
    </div>
</div>


@endsection