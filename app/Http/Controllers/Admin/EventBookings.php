<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventBooking;
use App\Models\Transaction;
use Illuminate\Http\Request;

class EventBookings extends Controller
{
    // ... your other methods (all, pending, completed) ...

    /**
     * Show all transactions with stats summary.
     */



    public function all()
{
    $bookings = EventBooking::with(['event', 'user'])->latest()->get();
    return view('admin.eventBookings.all', compact('bookings'));
}

public function pending()
{
    $bookings = EventBooking::with(['event', 'user'])->where('status', 'pending')->latest()->get();
    return view('admin.eventBookings.pending', compact('bookings'));
}

public function completed()
{
    $bookings = EventBooking::with(['event', 'user'])->where('status', 'confirmed')->latest()->get();
    return view('admin.eventBookings.completed', compact('bookings'));
}
    public function transaction(Request $request)
    {
        $status = $request->input('status');
        $search = $request->input('search');
        $from   = $request->input('from');
        $to     = $request->input('to');

        // Build the query **once** – all filters applied BEFORE collecting
        $query = Transaction::with(['user', 'eventBooking.event'])
            ->when($status && $status !== 'all', fn($q) => $q->where('status', $status))
            ->when($search, fn($q) => $q
                ->where('transaction_reference', 'like', "%{$search}%")
                ->orWhereHas('user', fn($u) => $u->where('name', 'like', "%{$search}%"))
            )
            ->when($from, fn($q) => $q->whereDate('created_at', '>=', $from))
            ->when($to,   fn($q) => $q->whereDate('created_at', '<=', $to))
            ->latest();

        // Paginate (10 per page – adjust as you wish)
        $transactions = $query->paginate(10)->withQueryString();

        // ---- Summary stats – calculated **after** filtering ----
        $totalRevenue = $transactions->where('status', 'completed')->sum('amount');
        $completed    = $transactions->where('status', 'completed')->count();
        $pending      = $transactions->where('status', 'pending')->count();
        $failed       = $transactions->where('status', 'failed')->count();
        $cancelled    = $transactions->where('status', 'cancelled')->count();

        return view('admin.transactions.index', compact(
            'transactions',
            'totalRevenue',
            'completed',
            'pending',
            'failed',
            'cancelled'
        ));
    }
}