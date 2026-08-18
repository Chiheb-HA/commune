<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CitizenRequest;
use App\Models\User;
use App\Services\CitizenRequestService;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    protected $requestService;

    public function __construct(CitizenRequestService $requestService)
    {
        $this->requestService = $requestService;
    }

    public function index(Request $request)
    {
        $status = $request->query('status');
        
        $query = CitizenRequest::with(['user', 'service']);

        if ($status) {
            $query->where('status', $status);
        }

        $requests = $query->orderBy('created_at', 'desc')->paginate(20);

        $stats = [
            'pending' => CitizenRequest::where('status', 'pending')->count(),
            'in_progress' => CitizenRequest::where('status', 'in_progress')->count(),
            'completed' => CitizenRequest::where('status', 'completed')->count(),
            'total' => CitizenRequest::count(),
        ];

        return view('admin.requests.index', compact('requests', 'stats'));
    }

    public function show(CitizenRequest $request)
    {
        $request->load(['user', 'service']);
        $officials = User::role('official')->get();

        return view('admin.requests.show', compact('request', 'officials'));
    }

    public function assign(Request $request, CitizenRequest $citizenRequest)
    {
        // Only allow assignment when status is 'on_hold'
        if ($citizenRequest->status !== 'on_hold') {
            return redirect()->route('admin.requests.index')
                ->with('error', __('messages.Can only assign when status is On Hold'));
        }

        $validated = $request->validate([
            'assigned_to' => 'required|exists:users,id',
        ]);

        $citizenRequest->update([
            'assigned_to' => $validated['assigned_to'],
            'assigned_at' => now(),
        ]);

        return redirect()->route('admin.requests.index')->with('success', __('messages.Request assigned successfully'));
    }

    public function updateStatus(Request $request, CitizenRequest $citizenRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,on_hold,completed,rejected,cancelled',
        ]);

        $citizenRequest->update([
            'status' => $validated['status'],
            'completed_at' => $validated['status'] === 'completed' ? now() : null,
        ]);

        return redirect()->route('admin.requests.index')->with('success', __('messages.Status updated successfully'));
    }

    public function complete(CitizenRequest $citizenRequest)
    {
        $this->requestService->complete($citizenRequest);

        return redirect()->back()->with('success', 'Request marked as completed');
    }

    public function statistics()
    {
        $stats = $this->requestService->getStatistics();
        return view('admin.requests.statistics', compact('stats'));
    }
}
