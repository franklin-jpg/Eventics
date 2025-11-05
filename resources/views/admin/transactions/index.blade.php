@extends('layouts.admin')

@section('content')
<main class="p-4">
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Transactions</h4>
        <div class="hidden md:flex items-center gap-2.5 font-semibold">
            <a href="#" class="text-sm text-slate-700 dark:text-slate-400">Attex</a>
            <i class="ri-arrow-right-s-line text-base text-slate-400"></i>
            <a href="#" class="text-sm text-slate-700 dark:text-slate-400">Transactions</a>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 mb-6">

        {{-- Total Revenue – now with icon --}}
        <div class="bg-gradient-to-br from-blue-900 to-blue-700 p-5 rounded-lg text-white shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-200 text-xs uppercase tracking-wider">Total Revenue</p>
                    <h3 class="text-2xl font-bold mt-1">₦{{ number_format($totalRevenue, 2) }}</h3>
                </div>
                <div class="w-10 h-10 bg-blue-400 bg-opacity-30 rounded-full flex items-center justify-center">
                    <i class="ri-money-dollar-circle-line text-blue-200 text-lg"></i>
                </div>
            </div>
        </div>

        {{-- Completed --}}
        <div class="bg-gradient-to-br from-green-600 to-green-500 p-5 rounded-lg text-white shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-200 text-xs uppercase tracking-wider">Completed</p>
                    <h3 class="text-2xl font-bold mt-1">{{ $completed }}</h3>
                </div>
                <div class="w-10 h-10 bg-green-400 bg-opacity-30 rounded-full flex items-center justify-center">
                    <i class="ri-check-line text-green-200 text-lg"></i>
                </div>
            </div>
        </div>

        {{-- Pending --}}
        <div class="bg-gradient-to-br from-yellow-600 to-yellow-500 p-5 rounded-lg text-white shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-yellow-200 text-xs uppercase tracking-wider">Pending</p>
                    <h3 class="text-2xl font-bold mt-1">{{ $pending }}</h3>
                </div>
                <div class="w-10 h-10 bg-yellow-400 bg-opacity-30 rounded-full flex items-center justify-center">
                    <i class="ri-time-line text-yellow-200 text-lg"></i>
                </div>
            </div>
        </div>

        {{-- Failed --}}
        <div class="bg-gradient-to-br from-red-600 to-red-500 p-5 rounded-lg text-white shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-red-200 text-xs uppercase tracking-wider">Failed</p>
                    <h3 class="text-2xl font-bold mt-1">{{ $failed }}</h3>
                </div>
                <div class="w-10 h-10 bg-red-400 bg-opacity-30 rounded-full flex items-center justify-center">
                    <i class="ri-close-line text-red-200 text-lg"></i>
                </div>
            </div>
        </div>

        {{-- Cancelled --}}
        <div class="bg-gradient-to-br from-gray-600 to-gray-500 p-5 rounded-lg text-white shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-200 text-xs uppercase tracking-wider">Cancelled</p>
                    <h3 class="text-2xl font-bold mt-1">{{ $cancelled }}</h3>
                </div>
                <div class="w-10 h-10 bg-gray-400 bg-opacity-30 rounded-full flex items-center justify-center">
                    <i class="ri-forbid-line text-gray-200 text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white dark:bg-slate-800 rounded-lg shadow p-4 mb-6">
        <form method="GET" class="flex flex-col sm:flex-row gap-3 items-center">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search by reference or user..."
                   class="flex-1 px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white">

            <select name="status" class="px-4 py-2 border border-gray-300 dark:border-slate-600 rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white">
                <option value="all">All Statuses</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="pending"   {{ request('status') == 'pending'   ? 'selected' : '' }}>Pending</option>
                <option value="failed"    {{ request('status') == 'failed'    ? 'selected' : '' }}>Failed</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>

            <div class="flex gap-2">
                <input type="date" name="from" value="{{ request('from') }}"
                       class="px-3 py-2 border border-gray-300 dark:border-slate-600 rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white text-sm">
                <input type="date" name="to" value="{{ request('to') }}"
                       class="px-3 py-2 border border-gray-300 dark:border-slate-600 rounded-md focus:ring-2 focus:ring-blue-500 dark:bg-slate-700 dark:text-white text-sm">
            </div>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-md transition">
                <i class="ri-search-line mr-1"></i> Filter
            </button>
        </form>
    </div>

    <!-- Transactions Table -->
    <div class="bg-white dark:bg-slate-800 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-slate-700">
                <thead class="bg-gray-50 dark:bg-slate-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-300 uppercase tracking-wider">Reference</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-300 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-300 uppercase tracking-wider">Event</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-300 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-300 uppercase tracking-wider">Method</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-300 uppercase tracking-wider">Channel</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-300 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-300 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-slate-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-slate-700">
                    @forelse($transactions as $txn)
                        <tr class="hover:bg-gray-50 dark:hover:bg-slate-700 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-slate-200">
                                <code class="text-xs bg-gray-100 dark:bg-slate-600 px-2 py-1 rounded">{{ $txn->transaction_reference }}</code>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-slate-200">
                                {{ $txn->user?->name ?? 'Guest' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-slate-200">
                                {{ $txn->eventBooking?->event?->title ?? '—' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-slate-200">
                                ₦{{ number_format($txn->amount, 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-slate-200">
                                <span class="capitalize">{{ $txn->payment_method }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-slate-200">
                                {{ $txn->channel ?? '—' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($txn->status)
                                    @case('completed')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            <i class="ri-check-line mr-1"></i> Completed
                                        </span>
                                        @break
                                    @case('pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200">
                                            <i class="ri-time-line mr-1"></i> Pending
                                        </span>
                                        @break
                                    @case('failed')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200">
                                            <i class="ri-close-line mr-1"></i> Failed
                                        </span>
                                        @break
                                    @case('cancelled')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                            <i class="ri-forbid-line mr-1"></i> Cancelled
                                        </span>
                                        @break
                                @endswitch
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-slate-400">
                                {{ $txn->created_at->format('M d, Y') }}<br>
                                <span class="text-xs text-gray-400">{{ $txn->created_at->format('h:i A') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href=""
                                   class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                    <i class="ri-eye-line text-lg"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-6 py-12 text-center text-gray-500 dark:text-slate-400">
                                <i class="ri-inbox-line text-4xl mb-2 block"></i>
                                No transactions found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="px-6 py-4 bg-gray-50 dark:bg-slate-700">
                {{ $transactions->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</main>
@endsection