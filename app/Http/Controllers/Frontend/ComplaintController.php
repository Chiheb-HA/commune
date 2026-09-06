<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\ComplaintCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ComplaintController extends Controller
{
    /**
     * Display complaints form
     */
    public function create()
    {
        $categories = ComplaintCategory::active()->orderBy('order')->get();
        return view('frontend.services.complaint-create', compact('categories'));
    }

    /**
     * Store a newly created complaint
     */
    public function store(Request $request)
    {
        try {
            \Log::info('Complaint submission started', ['request_data' => $request->all()]);

            $rules = [
                'category_id' => 'required|exists:complaint_categories,id',
                'description' => 'required|string|min:3',
                'priority' => 'required|in:low,medium,high,urgent',
                'attachments' => 'nullable|array|max:3',
                'attachments.*' => 'file|max:5120',
            ];

            if (auth()->check()) {
                $user = auth()->user();
                $rules['email'] = 'required|email|in:' . $user->email;
                $rules['phone'] = 'nullable|string|max:20';
            } else {
                $rules['name'] = 'required|string|max:255';
                $rules['cin'] = 'required|string|max:8';
                $rules['phone'] = 'required|string|max:20';
                $rules['email'] = 'nullable|email';
            }

            $validated = $request->validate($rules, [
                'email.in' => __('messages.email_must_match_account'),
            ]);

            if (!auth()->check()) {
                $user = User::firstOrCreate(
                    ['cin' => $validated['cin']],
                    [
                        'name' => $validated['name'],
                        'email' => 'guest-' . $validated['cin'] . '@commune.local',
                        'phone' => $validated['phone'],
                        'password' => Hash::make(str()->random(40)),
                        'status' => 'active',
                        'user_type' => 'citizen',
                    ]
                );
                if (!$user->hasRole('citizen')) {
                    $user->assignRole('citizen');
                }
            }

            \Log::info('Complaint validation passed', ['validated' => $validated]);
            \Log::info('User authenticated', ['user_id' => $user->cin, 'user_email' => $user->email]);

            $category = ComplaintCategory::find($validated['category_id']);
            
            $complaintData = [
                'user_id' => $user->cin,
                'cin' => $user->cin,
                'category_id' => $validated['category_id'],
                'category' => $category->slug ?? 'other',
                'description_fr' => $validated['description'],
                'description_en' => $validated['description'],
                'description_ar' => $validated['description'],
                'status' => 'new',
                'priority' => $validated['priority'],
                'email' => $validated['email'] ?? $user->email,
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

            return redirect()->route(auth()->check() ? 'citizen.dashboard' : 'services.complaint')
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
