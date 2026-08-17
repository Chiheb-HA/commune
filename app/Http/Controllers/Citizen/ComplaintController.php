<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the citizen's complaints.
     */
    public function index(): View
    {
        $complaints = Complaint::where('user_id', auth()->user()->cin)
            ->latest()
            ->paginate(10);

        return view('citizen.complaints.index', compact('complaints'));
    }

    /**
     * Display the specified complaint.
     */
    public function show(Complaint $complaint): View
    {
        // Ensure the user can only view their own complaints
        if ($complaint->user_id !== auth()->user()->cin) {
            abort(403);
        }

        return view('citizen.complaints.show', compact('complaint'));
    }
}
