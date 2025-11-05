@extends('layouts.admin')

@section('content')
    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Events</h4>

        <div class="md:flex hidden items-center gap-2.5 font-semibold">
            <div class="flex items-center gap-2">
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Attex</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Events</a>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="grid grid-cols-1 gap-6">
        <div class="card">
            <div class="p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                    <h4 class="card-title mb-0">All Events</h4>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.events.create') }}" class="btn bg-primary text-white">
                            <i class="ri-add-line mr-1"></i> Add New Event
                        </a>
                        <a href="{{ route('admin.events.archived') }}" class="btn bg-info text-white">
                            <i class="ri-archive-drawer-line mr-1"></i> View Archived ({{ $archivedCount }})
                        </a>
                    </div>
                </div>

                @if ($events->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Event</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Category</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Date</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Location</th>
                                         <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Ticket Price</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Status</th>
                                    <th scope="col"
                                        class="px-4 py-3 text-start text-sm font-medium text-gray-500 dark:text-gray-300">
                                        Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($events as $event)
                                    <tr>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                @if ($event->image)
                                                    <img class="w-12 h-12 rounded-md object-cover"
                                                        src="{{ Storage::url('event-images/' . $event->image) }}"
                                                        alt="{{ $event->title }}">
                                                @else
                                                    <div
                                                        class="w-12 h-12 rounded-md bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                                        <i class="ri-calendar-event-line text-gray-400"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ $event->title }}</div>
                                                    <div class="text-xs text-gray-500 dark:text-gray-400">
                                                        {{ $event->slug }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                                {{ $event->category->name }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $event->event_date->format('M d, Y') }}<br>
                                            <span class="text-xs text-gray-400">{{ $event->event_date->format('h:i A') }}</span>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300">
                                            <i class="ri-map-pin-line mr-1"></i>{{ Str::limit($event->location, 20) }}
                                        </td>
                                         <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300">
                                            &#x20A6;{{ $event->ticket_price }}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                                @if($event->status === 'published') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                                @elseif($event->status === 'draft') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                                @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                                @endif">
                                                {{ ucfirst($event->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-start space-x-3">
                                                <a href="{{ route('admin.events.show', $event) }}"
                                                    class="text-info hover:text-info-dark" title="View">
                                                    <i class="ri-eye-line text-base"></i>
                                                </a>
                                                <a href="{{ route('admin.events.edit', $event) }}"
                                                    class="text-primary hover:text-primary-dark" title="Edit">
                                                    <i class="ri-pencil-line text-base"></i>
                                                </a>
                                                <form action="{{ route('admin.events.destroy', $event) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-700"
                                                        title="Archive"
                                                        onclick="return confirm('Are you sure you want to archive this event?')">
                                                        <i class="ri-archive-line text-base"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $events->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <div
                            class="mx-auto w-24 h-24 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center mb-4">
                            <i class="ri-calendar-event-line text-3xl text-gray-400"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Events Found</h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-6">Get started by creating your first event.</p>
                        <a href="{{ route('admin.events.create') }}" class="btn bg-primary text-white">
                            <i class="ri-add-line mr-1"></i> Create New Event
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection