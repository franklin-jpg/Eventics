@extends('layouts.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold mb-6">All Event Bookings</h2>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-900 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3">S/N</th>
                    <th class="px-4 py-3">Event</th>
                    <th class="px-4 py-3">User</th>
                    <th class="px-4 py-3">Quantity</th>
                    <th class="px-4 py-3">Amount</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $key => $booking)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $key + 1 }}</td>
                    <td class="px-4 py-3">{{ $booking->event->title }}</td>
                    <td class="px-4 py-3">{{ $booking->user->name }}</td>
                    <td class="px-4 py-3">{{ $booking->quantity }}</td>
                    <td class="px-4 py-3">₦{{ number_format($booking->amount, 2) }}</td>
                    <td class="px-4 py-3">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold 
                            {{ $booking->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3">{{ $booking->created_at->format('d M, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
