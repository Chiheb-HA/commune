<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\FacilityReservation;
use Illuminate\Http\Request;

class FacilityReservationController extends Controller
{
    public function index()
    {
        $myReservations = collect();

        if (auth()->check()) {
            $user = auth()->user();
            $myReservations = FacilityReservation::query()
                ->where(function ($query) use ($user) {
                    if ($user->email) {
                        $query->where('citizen_email', $user->email);
                    }
                    $query->orWhere('citizen_name', $user->name);
                })
                ->latest()
                ->get();
        }

        return view('public.facility-reservations.index', compact('myReservations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'facility_type' => 'required|in:salle_des_fetes,souk',
            'citizen_name' => 'required|string|max:255',
            'citizen_phone' => 'required|string|max:255',
            'citizen_email' => 'nullable|email|max:255',
            'requested_date' => 'required|date|after_or_equal:today',
            'notes' => 'nullable|string',
        ]);

        FacilityReservation::create($validated);

        return redirect()->back()
            ->with('success', __('messages.reservation_submitted_successfully'));
    }
}
