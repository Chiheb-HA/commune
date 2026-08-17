<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Evenement;

class EventController extends Controller
{
    /**
     * Display a listing of events
     */
    public function index()
    {
        $events = Evenement::published()
            ->orderBy('date_debut', 'desc')
            ->paginate(12);

        return view('frontend.events.index', compact('events'));
    }

    /**
     * Display upcoming events
     */
    public function upcoming()
    {
        $events = Evenement::published()
            ->upcoming()
            ->paginate(12);

        return view('frontend.events.upcoming', compact('events'));
    }

    /**
     * Display the specified event
     */
    public function show($slug)
    {
        $event = Evenement::published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Get related events
        $relatedEvents = Evenement::published()
            ->where('id', '!=', $event->id)
            ->orderBy('date_debut', 'desc')
            ->take(4)
            ->get();

        return view('frontend.events.show', compact('event', 'relatedEvents'));
    }
}
