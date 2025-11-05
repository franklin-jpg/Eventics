<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('category')->latest()->paginate(10);

        // $events = Event::paginate(10);


        $archivedCount = Event::onlyTrashed()->count();

        return view('admin.events.index', compact('events', 'archivedCount'));
    }


    public function archived()
    {
        $events = Event::onlyTrashed()->with('category')->latest()->paginate(1);

        return view('admin.events.archived', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = EventCategory::where('status', 'active')->get();
        // dd($categories);
        return view('admin.events.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_title' => 'required|unique:events,title',
            'event_category_id' => 'required|exists:event_categories,id',
            'event_description' => 'nullable|string',
            'event_date' => 'required|date|after_or_equal:today',
            'event_location' => 'required|string|max:255',
            'ticket_price' => 'required|numeric|min:6|max:1000000',
            'event_status' => 'required|in:draft,published,cancelled',
            'event_image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
            ],
        ], [
            'event_title.required' => 'Event title is required.',
            'event_title.unique' => 'Event title already exists.',
            'event_category_id.required' => 'Event category is required.',
            'event_category_id.exists' => 'Selected category does not exist.',
            'event_date.required' => 'Event date is required.',
            'event_date.after_or_equal' => 'Event date cannot be in the past.',
            'event_location.required' => 'Event location is required.',
            'ticket_price.required' => ' ticket price is required',
            'event_status.required' => 'Event status is required.',
            'event_image.required' => 'Please select an image to upload.',
            'event_image.image' => 'The file must be an image.',
            'event_image.mimes' => 'The image must be a PNG, JPG, or JPEG file.',
            'event_image.max' => 'The image must not exceed 2MB in size.',
        ]);

        try {
            // Handle image upload
            $image = $request->file('event_image');
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $storagePath = 'event-images/';

            // Store image
            $imagePath = $image->storeAs($storagePath, $filename, 'public');

            // Create event
            Event::create([
                'event_category_id' => $validated['event_category_id'],
                'title' => $validated['event_title'],
                'slug' => Str::slug($validated['event_title']),
                'description' => $validated['event_description'],
                'event_date' => $validated['event_date'],
                'location' => $validated['event_location'],
                'ticket_price' => $validated['ticket_price'],
                'status' => $validated['event_status'],
                'image' => $filename
            ]);

            return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
        } catch (Exception $e) {
            if (isset($filename)) {
                Storage::disk('public')->delete('event-images/' . $filename);
            }

            // dd($e->getMessage());

            return redirect()->back()->with('error', 'Failed to process.' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event->load('category');
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = EventCategory::where('status', 'active')->get();

        return view('admin.events.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'event_title' => 'required|unique:events,title,' . $event->id,
            'event_category_id' => 'required|exists:event_categories,id',
            'event_description' => 'nullable|string',
            'event_date' => 'required|date',
            'event_location' => 'required|string|max:255',
            'ticket_price' => 'required|numeric|min:6|max:10',
            'event_status' => 'required|in:draft,published,cancelled',
            'event_image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
            ],
        ], [
            'event_title.required' => 'Event title is required.',
            'event_title.unique' => 'Event title already exists.',
            'event_category_id.required' => 'Event category is required.',
            'event_category_id.exists' => 'Selected category does not exist.',
            'event_date.required' => 'Event date is required.',
            'event_location.required' => 'Event location is required.',
            'ticket_price.required' => ' ticket price is required',
            'event_status.required' => 'Event status is required.',
            'event_image.image' => 'The file must be an image.',
            'event_image.mimes' => 'The image must be a PNG, JPG, or JPEG file.',
            'event_image.max' => 'The image must not exceed 2MB in size.',
        ]);

        try {
            $filename = $event->image;

            // Handle new image upload
            if ($request->hasFile('event_image')) {
                // Delete old image
                if ($event->image) {
                    Storage::disk('public')->delete('event-images/' . $event->image);
                }

                // Upload new image
                $image = $request->file('event_image');
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $storagePath = 'event-images/';
                $image->storeAs($storagePath, $filename, 'public');
            }

            // Update event
            $event->update([
                'event_category_id' => $validated['event_category_id'],
                'title' => $validated['event_title'],
                'slug' => Str::slug($validated['event_title']),
                'description' => $validated['event_description'],
                'event_date' => $validated['event_date'],
                'location' => $validated['event_location'],
                'ticket_price' => $validated['ticket_price'],
                'status' => $validated['event_status'],
                'image' => $filename
            ]);

            return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
        } catch (Exception $e) {
            if (isset($filename) && $filename !== $event->image) {
                Storage::disk('public')->delete('event-images/' . $filename);
            }

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        try {
            $event->delete();

            return redirect()->route('admin.events.index')->with('success', 'Event archived successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function restore($id)
    {
        try {
            $event = Event::onlyTrashed()->findOrFail($id);
            $event->restore();

            return redirect()->route('admin.events.archived')->with('success', 'Event restored successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }

    public function forceDelete($id)
    {
        try {
            $event = Event::onlyTrashed()->findOrFail($id);

            // Delete image file
            if ($event->image) {
                Storage::disk('public')->delete('event-images/' . $event->image);
            }

            $event->forceDelete();

            return redirect()->route('admin.events.archived')->with('success', 'Event permanently deleted.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Something went wrong. Please try again.']);
        }
    }
}