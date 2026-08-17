<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display complaints form
     */
    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('info', __('messages.please_login_to_continue'));
        }
        return view('frontend.services.complaint-create');
    }

    /**
     * Store a newly created complaint
     */
    public function store(Request $request)
    {
        try {
            if (!auth()->check()) {
                return redirect()->route('login')->with('info', __('messages.please_login_to_continue'));
            }

            $user = auth()->user();

            \Log::info('Complaint submission started', ['request_data' => $request->all()]);

            $validated = $request->validate([
                'category' => 'required|in:infrastructure,services,staff,cleanliness,security,other',
                'description' => 'required|string|min:3',
                'email' => 'required|email|in:' . $user->email,
                'phone' => 'nullable|string|max:20',
                'priority' => 'required|in:low,medium,high,urgent',
                'attachments' => 'nullable|array|max:3',
                'attachments.*' => 'file|max:5120',
            ], [
                'email.in' => __('messages.email_must_match_account'),
            ]);

            \Log::info('Complaint validation passed', ['validated' => $validated]);
            \Log::info('User authenticated', ['user_id' => $user->cin, 'user_email' => $user->email]);

            $complaintData = [
                'user_id' => $user->cin,
                'cin' => $user->cin,
                'category' => $validated['category'],
                'description_fr' => $validated['description'],
                'description_en' => $validated['description'],
                'description_ar' => $validated['description'],
                'status' => 'new',
                'priority' => $validated['priority'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'location' => $request->input('location'),
            ];

            // Handle file uploads
            $attachments = [];
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $attachments[] = $file->store('complaints', 'public');
                }
            }
            $complaintData['attachments'] = $attachments;

            \Log::info('Creating complaint with data', ['complaint_data' => $complaintData]);

            $complaint = Complaint::create($complaintData);

            \Log::info('Complaint created successfully', ['complaint_id' => $complaint->id, 'complaint_number' => $complaint->complaint_number]);

            return redirect()->route('citizen.dashboard')
                ->with('success', __('messages.complaint_submitted_successfully', ['reference' => $complaint->complaint_number]));

        } catch (\Exception $e) {
            \Log::error('Complaint submission failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Error submitting complaint: ' . $e->getMessage());
        }
    }

    /**
     * Display complaint status
     */
    public function show($id)
    {
        $complaint = Complaint::findOrFail($id);

        return view('frontend.services.complaint-show', compact('complaint'));
    }

    /**
     * Display my complaints (for authenticated users)
     */
    public function myComplaints()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('info', __('messages.please_login_to_continue'));
        }

        $complaints = Complaint::where('user_id', auth()->user()->cin)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.services.my-complaints', compact('complaints'));
    }
}
