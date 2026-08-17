<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->query('status');
        $priority = $request->query('priority');

        $query = Complaint::with(['user', 'assignedTo']);

        if ($status) {
            $query->where('status', $status);
        }

        if ($priority) {
            $query->where('priority', $priority);
        }

        $complaints = $query->orderBy('created_at', 'desc')->paginate(20);

        $stats = [
            'new' => Complaint::where('status', 'new')->count(),
            'in_investigation' => Complaint::where('status', 'in_investigation')->count(),
            'resolved' => Complaint::where('status', 'resolved')->count(),
            'total' => Complaint::count(),
        ];

        return view('admin.complaints.index', compact('complaints', 'stats'));
    }

    public function show(Complaint $complaint)
    {
        $complaint->load(['user', 'assignedTo']);
        $officials = User::role('official')->get();

        return view('admin.complaints.show', compact('complaint', 'officials'));
    }

    public function assign(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'assigned_to' => 'required|exists:users,id',
        ]);

        $complaint->update([
            'assigned_to' => $validated['assigned_to'],
            'assigned_at' => now(),
            'status' => 'in_investigation',
        ]);

        return redirect()->back()->with('success', 'Complaint assigned successfully');
    }

    public function respond(Request $request, Complaint $complaint)
    {
        $validated = $request->validate([
            'response' => 'required|string',
        ]);

        $complaint->update([
            'response' => $validated['response'],
            'status' => 'resolved',
            'resolved_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Response submitted successfully');
    }

    public function close(Complaint $complaint)
    {
        $complaint->update(['status' => 'closed']);

        return redirect()->back()->with('success', 'Complaint closed successfully');
    }

    public function statistics()
    {
        $stats = [
            'total' => Complaint::count(),
            'new' => Complaint::where('status', 'new')->count(),
            'in_investigation' => Complaint::where('status', 'in_investigation')->count(),
            'resolved' => Complaint::where('status', 'resolved')->count(),
            'dismissed' => Complaint::where('status', 'dismissed')->count(),
            'closed' => Complaint::where('status', 'closed')->count(),
        ];

        return view('admin.complaints.statistics', compact('stats'));
    }
}
