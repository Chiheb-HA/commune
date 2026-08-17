<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\CitizenRequest;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the citizen dashboard.
     */
    public function index(): View
    {
        $user = auth()->user();

        $requests = CitizenRequest::where('user_id', $user->cin)
            ->latest()
            ->take(5)
            ->get();

        $complaints = Complaint::where('user_id', $user->cin)
            ->latest()
            ->take(5)
            ->get();

        $pendingRequests = CitizenRequest::where('user_id', $user->cin)
            ->where('status', 'pending')
            ->count();

        $pendingComplaints = Complaint::where('user_id', $user->cin)
            ->where('status', 'new')
            ->count();

        return view('citizen.dashboard', compact(
            'requests',
            'complaints',
            'pendingRequests',
            'pendingComplaints'
        ));
    }
}
