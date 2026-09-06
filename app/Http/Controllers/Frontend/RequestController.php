<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CitizenRequest;
use App\Models\MunicipalService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RequestController extends Controller
{
    /**
     * Display request form
     */
    public function create()
    {
        $services = MunicipalService::active()
            ->orderBy('order')
            ->get()
            ->unique(function ($service) {
                return strtolower(trim($service->name_fr ?? $service->name_en ?? $service->name_ar));
            })
            ->values();

        return view('frontend.services.request-create', compact('services'));
    }

    /**
     * Store a newly created request
     */
    public function store(Request $request)
    {
        try {
            \Log::info('Request submission started', ['request_data' => $request->all()]);

            $rules = [
                'service_id' => 'required|exists:municipal_services,id',
                'description' => 'required|string|min:3',
                'priority' => 'required|in:low,medium,high',
                'attachments' => 'nullable|array|max:3',
                'attachments.*' => 'file|max:5120',
            ];

            if (auth()->check()) {
                $user = auth()->user();
            } else {
                $rules['name'] = 'required|string|max:255';
                $rules['cin'] = 'required|string|max:8';
                $rules['phone'] = 'required|string|max:20';
                $validated = $request->validate($rules);
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

            $validated ??= $request->validate($rules);

            \Log::info('Request validation passed', ['validated' => $validated]);

            $user = auth()->user();
            \Log::info('User authenticated', ['user_id' => $user->cin, 'user_email' => $user->email]);

            $requestData = [
                'user_id' => $user->cin,
                'cin' => $user->cin,
                'service_id' => $validated['service_id'],
                'status' => 'pending',
                'priority' => $validated['priority'],
                'description_fr' => $validated['description'],
                'description_en' => $validated['description'],
                'description_ar' => $validated['description'],
            ];

            \Log::info('Creating request with data', ['request_data' => $requestData]);

            $citizenRequest = DB::transaction(function () use ($request, $requestData, $user) {
                $citizenRequest = CitizenRequest::create($requestData);

                \Log::info('Request created successfully', ['request_id' => $citizenRequest->id, 'request_number' => $citizenRequest->request_number]);

                // Handle file uploads
                if ($request->hasFile('attachments')) {
                    foreach ($request->file('attachments') as $file) {
                        $citizenRequest->documents()->create([
                            'file_path' => $file->store('requests', 'public'),
                            'file_name' => $file->getClientOriginalName(),
                            'file_type' => $file->getClientMimeType(),
                            'file_size' => $file->getSize(),
                            'uploaded_by' => $user->cin,
                        ]);
                    }
                }

                return $citizenRequest;
            });

            return redirect()->route(auth()->check() ? 'citizen.dashboard' : 'services.request')
                ->with('success', __('messages.request_submitted_successfully', ['reference' => $citizenRequest->request_number]));

        } catch (\Exception $e) {
            \Log::error('Request submission failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->with('error', 'Error submitting request: ' . $e->getMessage());
        }
    }
}
