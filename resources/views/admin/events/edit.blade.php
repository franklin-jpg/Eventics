@extends('layouts.admin')

@section('content')
    <!-- Page Title Start -->
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Edit Event</h4>

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
                <a href="#" class="text-sm font-medium text-slate-700 dark:text-slate-400" aria-current="page">Edit</a>
            </div>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="grid lg:grid-cols-1 gap-2">
        <div class="lg:col-span-1">
            <div class="card">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h4 class="card-title mb-0">Edit Event - {{ $event->title }}</h4>
                        <a href="{{ route('admin.events.index') }}" class="btn bg-secondary text-white">
                            <i class="ri-arrow-left-line mr-1"></i> Back to Events
                        </a>
                    </div>

                    <div class="pt-5">
                        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="event_title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Title
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" name="event_title" id="event_title"
                                        class="form-input @error('event_title') border-red-500 @enderror"
                                        placeholder="e.g. Summer Music Festival"
                                        value="{{ old('event_title', $event->title) }}" required>
                                    @error('event_title')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="event_category_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Category
                                        <span class="text-red-500">*</span></label>
                                    <select name="event_category_id" id="event_category_id"
                                        class="form-select @error('event_category_id') border-red-500 @enderror" required>
                                        <option value="" disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('event_category_id', $event->event_category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('event_category_id')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="event_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Event Date
                                        <span class="text-red-500">*</span></label>
                                    <input type="datetime-local" name="event_date" id="event_date"
                                        class="form-input @error('event_date') border-red-500 @enderror"
                                        value="{{ old('event_date', $event->event_date->format('Y-m-d\TH:i')) }}" required>
                                    @error('event_date')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="event_location"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" name="event_location" id="event_location"
                                        class="form-input @error('event_location') border-red-500 @enderror"
                                        placeholder="e.g. Central Park, New York"
                                        value="{{ old('event_location', $event->location) }}" required>
                                    @error('event_location')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                 <div>
                                    <label for="ticket_price"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket Price
                                        <span class="text-red-500">*</span></label>
                                    <input type="text" name="ticket_price" id="ticket_price"
                                        class="form-input @error('ticket_price') border-red-500 @enderror"
                                        placeholder="e.g. $500"
                                        value="{{ old('ticket_price',  $event->ticket_price) }}" required>
                                    @error('ticket_price')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="event_status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                        <span class="text-red-500">*</span></label>
                                    <select name="event_status" id="event_status"
                                        class="form-select @error('event_status') border-red-500 @enderror" required>
                                        <option value="" disabled>Select Status</option>
                                        <option value="draft" {{ old('event_status', $event->status) == 'draft' ? 'selected' : '' }}>
                                            Draft</option>
                                        <option value="published" {{ old('event_status', $event->status) == 'published' ? 'selected' : '' }}>
                                            Published</option>
                                        <option value="cancelled" {{ old('event_status', $event->status) == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                    </select>
                                    @error('event_status')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="lg:col-span-2">
                                    <label for="event_description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                    <textarea name="event_description" id="event_description" rows="4"
                                        class="form-input @error('event_description') border-red-500 @enderror"
                                        placeholder="Enter event description...">{{ old('event_description', $event->description) }}</textarea>
                                    @error('event_description')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="lg:col-span-2">
                                    <label for="event_image" class="mb-2">Event Image</label>

                                    @if($event->image)
                                        <div class="mb-3">
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Current Image:</p>
                                            <img src="{{ Storage::url('event-images/' . $event->image) }}"
                                                alt="{{ $event->title }}"
                                                class="w-32 h-32 object-cover rounded-md">
                                        </div>
                                    @endif

                                    <input type="file" name="event_image" class="form-input" id="event_image" accept="image/*">
                                    <p class="text-xs text-gray-500 mt-1">Leave empty to keep current image</p>
                                    @error('event_image')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-end mt-6 space-x-3">
                                <a href="{{ route('admin.events.index') }}" class="btn bg-secondary text-white">
                                    <i class="ri-close-line mr-1"></i> Cancel
                                </a>
                                <button type="submit" class="btn bg-primary text-white">
                                    <i class="ri-save-line mr-1"></i> Update Event
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection