<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CouncilSessionNotification;
use App\Models\CouncilSession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CouncilSessionController extends Controller
{
    public function index()
    {
        $sessions = CouncilSession::orderByDesc('session_date')->get();

        return view('admin.council-sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('admin.council-sessions.form');
    }

    public function store(Request $request)
    {
        CouncilSession::create($this->validatedData($request));

        return redirect()->route('admin.council-sessions.index')
            ->with('success', __('messages.council_session_created'));
    }

    public function edit(CouncilSession $councilSession)
    {
        return view('admin.council-sessions.form', ['session' => $councilSession]);
    }

    public function update(Request $request, CouncilSession $councilSession)
    {
        $councilSession->update($this->validatedData($request));

        return redirect()->route('admin.council-sessions.index')
            ->with('success', __('messages.council_session_updated'));
    }

    public function destroy(CouncilSession $councilSession)
    {
        $councilSession->delete();

        return redirect()->route('admin.council-sessions.index')
            ->with('success', __('messages.council_session_deleted'));
    }

    public function notifyMembers(CouncilSession $councilSession)
    {
        abort_unless($councilSession->status === 'upcoming', 422, __('messages.council_session_must_be_upcoming'));

        $officials = User::whereHas('roles', function ($query) {
            $query->where('name', 'official');
        })->whereNotNull('email')->get();

        foreach ($officials as $official) {
            Mail::to($official->email)->send(new CouncilSessionNotification($councilSession));
        }

        return redirect()->back()
            ->with('success', __('messages.council_members_notified', ['count' => $officials->count()]));
    }

    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'session_date' => 'required|date',
            'type' => 'required|in:ordinaire,extraordinaire',
            'committee_name' => 'nullable|string|max:255',
            'minutes_document' => 'nullable|file|mimes:pdf|max:10240',
            'status' => 'required|in:upcoming,held,cancelled',
        ]);

        if ($request->hasFile('minutes_document')) {
            $validated['minutes_document'] = $request->file('minutes_document')->store('council-sessions', 'public');
        } else {
            unset($validated['minutes_document']);
        }

        return $validated;
    }
}