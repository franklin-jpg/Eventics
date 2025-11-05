@extends('layouts.admin')

@section('content')
    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Event Details</h4>

        <div class="md:flex hidden items-center gap-2.5 font-semibold">
            <div class="flex items-center gap-2">
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400">Attex</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="{{ route('admin.events.index') }}"
                    class="text-sm font-medium text-slate-700 dark:text-slate-400">Events</a>
            </div>

            <div class="flex items-center gap-2">
                <i class="ri-arrow-right-s-line text-base text-slate-400 rtl:rotate-180"></i>
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400"
                    aria-current="page">View</a>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Event Image and Actions -->
        <div class="lg:col-span-1">
            <div class="card">
                <div class="p-6">
                    <h5 class="card-title mb-4">Event Image</h5>
                    @if ($event->image)
                        <img src="{{ Storage::url('event-images/' . $event->image) }}" alt="{{ $event->title }}"
                            class="w-full h-64 object-cover rounded-lg mb-4">
                    @else
                        <div
                            class="w-full h-64 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center mb-4">
                            <i class="ri-calendar-event-line text-6xl text-gray-400"></i>
                        </div>
                    @endif

                    <div class="space-y-2">
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn bg-primary text-white w-full">
                            <i class="ri-pencil-line mr-1"></i> Edit Event
                        </a>
                        <a href="{{ route('admin.events.index') }}" class="btn bg-secondary text-white w-full">
                            <i class="ri-arrow-left-line mr-1"></i> Back to Events
                        </a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn bg-red-500 text-white w-full"
                                onclick="return confirm('Are you sure you want to archive this event?')">
                                <i class="ri-archive-line mr-1"></i> Archive Event
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Details -->
        <div class="lg:col-span-2">
            <div class="card">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h4 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $event->title }}</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Slug: {{ $event->slug }}</p>
                        </div>
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            @if ($event->status === 'published') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                            @elseif($event->status === 'draft') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                            @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200 @endif">
                            {{ ucfirst($event->status) }}
                        </span>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6 mt-6">
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    <i class="ri-folder-line mr-1"></i> Category
                                </dt>
                                <dd class="text-base text-gray-900 dark:text-white">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ $event->category->name }}
                                    </span>
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    <i class="ri-calendar-line mr-1"></i> Event Date
                                </dt>
                                <dd class="text-base text-gray-900 dark:text-white">
                                    {{ $event->event_date->format('F d, Y') }}
                                    <br>
                                    <span class="text-sm text-gray-500">{{ $event->event_date->format('h:i A') }}</span>
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    <i class="ri-map-pin-line mr-1"></i> Location
                                </dt>
                                <dd class="text-base text-gray-900 dark:text-white">
                                    {{ $event->location }}
                                </dd>
                            </div>


                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                     Ticket Price
                                </dt>
                                <dd class="text-base text-gray-900 dark:text-white">
                                    &#x20A6;{{ $event->ticket_price }}
                                </dd>
                            </div>

                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    <i class="ri-time-line mr-1"></i> Time Until Event
                                </dt>
                                <dd class="text-base text-gray-900 dark:text-white">
                                    @if ($event->event_date->isFuture())
                                        {{ $event->event_date->diffForHumans() }}
                                    @else
                                        <span class="text-red-500">Event has passed</span>
                                    @endif
                                </dd>
                            </div>

                            <div class="md:col-span-2">
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                    <i class="ri-file-text-line mr-1"></i> Description
                                </dt>
                                <dd class="text-base text-gray-900 dark:text-white">
                                    @if ($event->description)
                                        <p class="whitespace-pre-wrap">{{ $event->description }}</p>
                                    @else
                                        <p class="text-gray-400 italic">No description provided</p>
                                    @endif
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6 mt-6">
                        <h5 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-3">Metadata</h5>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <dt class="text-gray-500 dark:text-gray-400">Created At</dt>
                                <dd class="text-gray-900 dark:text-white">{{ $event->created_at->format('M d, Y h:i A') }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-gray-500 dark:text-gray-400">Last Updated</dt>
                                <dd class="text-gray-900 dark:text-white">{{ $event->updated_at->format('M d, Y h:i A') }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection