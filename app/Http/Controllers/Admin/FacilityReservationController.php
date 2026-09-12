<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FacilityReservation;
use Illuminate\Http\Request;

class FacilityReservationController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $facilityType = $request->query('facility_type');

        $reservations = FacilityReservation::query()
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->when($facilityType, function ($query) use ($facilityType) {
                $query->where('facility_type', $facilityType);
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.facility-reservations.index', compact('reservations', 'status', 'facilityType'));
    }

    public function show(FacilityReservation $facilityReservation)
    {
        return view('admin.facility-reservations.show', ['reservation' => $facilityReservation]);
    }

    public function update(Request $request, FacilityReservation $facilityReservation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'notes' => 'nullable|string',
        ]);

        $facilityReservation->update($validated);

        return redirect()->route('admin.facility-reservations.index')
            ->with('success', __('messages.reservation_updated_successfully'));
    }

    public function destroy(FacilityReservation $facilityReservation)
    {
        $facilityReservation->delete();

        return redirect()->route('admin.facility-reservations.index')
            ->with('success', __('messages.reservation_deleted_successfully'));
    }
}
