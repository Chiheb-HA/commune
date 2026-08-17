<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $sort = $request->get('sort', 'upcoming');

        if ($search) {
            $locale = app()->getLocale();
            $events = Event::where('status', 'published')
                ->where(function ($q) use ($search, $locale) {
                    $titleField = "title_{$locale}";
                    $descField = "description_{$locale}";
                    
                    $q->where($titleField, 'like', "%{$search}%")
                      ->orWhere($descField, 'like', "%{$search}%");
                })
                ->orderBy('start_date', 'asc')
                ->paginate(12);
        } else {
            switch ($sort) {
                case 'latest':
                    $events = Event::where('status', 'published')
                        ->orderBy('created_at', 'desc')
                        ->paginate(12);
                    break;
                case 'oldest':
                    $events = Event::where('status', 'published')
                        ->orderBy('created_at', 'asc')
                        ->paginate(12);
                    break;
                case 'upcoming':
                default:
                    $events = Event::where('status', 'published')
                        ->where('start_date', '>', now())
                        ->orderBy('start_date', 'asc')
                        ->paginate(12);
                    break;
            }
        }

        return view('public.events.index', compact('events'));
    }

    public function show($slug)
    {
        $event = Event::where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (!$event) {
            abort(404);
        }

        return view('public.events.show', compact('event'));
    }

    public function register(Request $request, Event $event)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'number_of_participants' => 'required|integer|min:1|max:' . ($event->capacity ?? 10),
        ]);

        $registration = $event->registrations()->create([
            'user_id' => auth()->id(),
            'email' => $request->email,
            'phone' => $request->phone,
            'number_of_participants' => $request->number_of_participants,
            'status' => 'registered',
        ]);

        return redirect()->back()->with('success', 'Registration successful!');
    }

    public function cancelRegistration(EventRegistration $registration)
    {
        if ($registration->user_id !== auth()->id()) {
            abort(403);
        }

        $registration->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Registration cancelled.');
    }
}
