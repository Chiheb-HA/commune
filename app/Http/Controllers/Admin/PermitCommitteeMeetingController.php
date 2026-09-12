<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermitCommitteeMeeting;
use Illuminate\Http\Request;

class PermitCommitteeMeetingController extends Controller
{
    public function index()
    {
        $meetings = PermitCommitteeMeeting::orderBy('meeting_date', 'desc')->paginate(15);

        return view('admin.permit-committee-meetings.index', compact('meetings'));
    }

    public function create()
    {
        return view('admin.permit-committee-meetings.form');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedData($request);
        PermitCommitteeMeeting::create($validated);

        return redirect()->route('admin.permit-committee-meetings.index')
            ->with('success', __('messages.permit_committee_meeting_created'));
    }

    public function edit(PermitCommitteeMeeting $permitCommitteeMeeting)
    {
        return view('admin.permit-committee-meetings.form', ['meeting' => $permitCommitteeMeeting]);
    }

    public function update(Request $request, PermitCommitteeMeeting $permitCommitteeMeeting)
    {
        $validated = $this->validatedData($request);
        $permitCommitteeMeeting->update($validated);

        return redirect()->route('admin.permit-committee-meetings.index')
            ->with('success', __('messages.permit_committee_meeting_updated'));
    }

    public function destroy(PermitCommitteeMeeting $permitCommitteeMeeting)
    {
        $permitCommitteeMeeting->delete();

        return redirect()->route('admin.permit-committee-meetings.index')
            ->with('success', __('messages.permit_committee_meeting_deleted'));
    }

    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'meeting_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'agenda_fr' => 'nullable|string',
            'agenda_en' => 'nullable|string',
            'agenda_ar' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        return $validated;
    }
}
