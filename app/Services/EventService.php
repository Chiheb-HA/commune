<?php

namespace App\Services;

use App\Models\Event;
use App\Models\EventRegistration;

class EventService
{
    public function getUpcoming($perPage = 12)
    {
        return Event::published()
            ->upcoming()
            ->orderBy('start_date', 'asc')
            ->paginate($perPage);
    }

    public function getPast($perPage = 12)
    {
        return Event::published()
            ->past()
            ->orderBy('start_date', 'desc')
            ->paginate($perPage);
    }

    public function getBySlug($slug)
    {
        return Event::published()
            ->where('slug', $slug)
            ->with(['registrations', 'organizer'])
            ->first();
    }

    public function search($query, $perPage = 12)
    {
        return Event::published()
            ->where(function ($q) use ($query) {
                $q->where('title_fr', 'like', "%{$query}%")
                  ->orWhere('title_en', 'like', "%{$query}%")
                  ->orWhere('description_fr', 'like', "%{$query}%");
            })
            ->orderBy('start_date', 'asc')
            ->paginate($perPage);
    }

    public function register($eventId, $userId, $data)
    {
        $event = Event::find($eventId);

        if (!$event || $event->capacity && $event->registrations >= $event->capacity) {
            return null;
        }

        $registration = EventRegistration::create([
            'event_id' => $eventId,
            'user_id' => $userId,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'number_of_participants' => $data['number_of_participants'] ?? 1,
        ]);

        $event->increment('registrations', $data['number_of_participants'] ?? 1);

        return $registration;
    }

    public function cancelRegistration($registrationId)
    {
        $registration = EventRegistration::find($registrationId);

        if ($registration) {
            $registration->update(['status' => 'cancelled']);
            $registration->event->decrement('registrations', $registration->number_of_participants);
        }

        return $registration;
    }

    public function getUserRegistrations($userId, $perPage = 10)
    {
        return EventRegistration::where('user_id', $userId)
            ->with('event')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getEventRegistrations($eventId, $perPage = 20)
    {
        return EventRegistration::where('event_id', $eventId)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getStatistics()
    {
        return [
            'total_events' => Event::published()->count(),
            'upcoming_events' => Event::published()->upcoming()->count(),
            'total_registrations' => EventRegistration::count(),
            'confirmed_registrations' => EventRegistration::where('status', 'confirmed')->count(),
        ];
    }
}
