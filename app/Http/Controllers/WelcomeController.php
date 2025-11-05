<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // dd('jjjjjj');

        $events = Event::with('category')
            ->where('status', 'published')
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get();
        // dd($events);

        $categories = EventCategory::all();
        return view('welcome', compact('events', 'categories'));
    }
}
