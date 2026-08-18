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

        // Clear any cached data
        cache()->forget('citizen_requests_stats');

        $query = CitizenRequest::with(['user', 'service']);

        if ($status) {
            $query->where('status', $status);
        }

        $requests = $query->orderBy('created_at', 'desc')->paginate(20);

        $stats = [
            'pending' => CitizenRequest::where('status', 'pending')->count(),
            'in_progress' => CitizenRequest::where('status', 'in_progress')->count(),
            'on_hold' => CitizenRequest::where('status', 'on_hold')->count(),
            'completed' => CitizenRequest::where('status', 'completed')->count(),
            'rejected' => CitizenRequest::where('status', 'rejected')->count(),
            'total' => CitizenRequest::count(),
        ];

        \Log::info('Requests index stats', ['stats' => $stats]);

        return view('admin.requests.index', compact('requests', 'stats'));
    }

    public function show($id)
    {
        $request = CitizenRequest::with(['user', 'service'])->findOrFail($id);
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
            'assigned_to' => 'required|exists:users,cin',
        ]);

        $citizenRequest->update([
            'assigned_to' => $validated['assigned_to'],
            'assigned_at' => now(),
        ]);

        return redirect()->route('admin.requests.index')->with('success', __('messages.Request assigned successfully'));
    }

    public function updateStatus(Request $request, CitizenRequest $citizenRequest)
    {
        try {
            $validated = $request->validate([
                'status' => 'required|in:on_hold,completed,in_progress,rejected',
            ]);

            \Log::info('Updating request status', [
                'request_id' => $citizenRequest->id,
                'old_status' => $citizenRequest->status,
                'new_status' => $validated['status']
            ]);

            $result = $citizenRequest->update([
                'status' => $validated['status'],
                'completed_at' => $validated['status'] === 'completed' ? now() : null,
            ]);

            $updatedRequest = $citizenRequest->fresh();

            \Log::info('Request status update result', [
                'request_id' => $citizenRequest->id,
                'update_result' => $result,
                'current_status' => $updatedRequest ? $updatedRequest->status : 'null'
            ]);

            // Clear any cached data
            cache()->forget('citizen_requests_stats');

            return redirect()->route('admin.requests.index')->with('success', __('messages.Status updated successfully'));

        } catch (\Exception $e) {
            \Log::error('Error updating request status', [
                'error' => $e->getMessage(),
                'request_id' => $citizenRequest->id ?? 'unknown'
            ]);

            return redirect()->back()->with('error', 'Error updating status: ' . $e->getMessage());
        }
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
