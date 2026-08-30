<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\CitizenRequest;
use App\Models\Complaint;
use App\Models\MunicipalService;
use App\Models\Department;
use App\Models\Official;
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

        // Quick access data
        $totalServices = MunicipalService::where('is_active', true)->count();
        $totalDepartments = Department::active()->count();
        $totalOfficials = Official::active()->count();
        $popularServices = MunicipalService::where('is_active', true)
            ->orderBy('order', 'asc')
            ->take(4)
            ->get();

        return view('citizen.dashboard', compact(
            'requests',
            'complaints',
            'pendingRequests',
            'pendingComplaints',
            'totalServices',
            'totalDepartments',
            'totalOfficials',
            'popularServices'
        ));
    }
}
