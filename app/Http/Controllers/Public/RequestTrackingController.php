<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CitizenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class RequestTrackingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $key = 'request-tracking:' . $request->ip();
            
            if (RateLimiter::tooManyAttempts($key, 10)) {
                return back()->with('error', __('messages.Too many requests. Please try again later.'));
            }

            RateLimiter::hit($key, 60);

            $validated = $request->validate([
                'request_number' => 'required|string',
                'cin' => 'required|string|max:8',
            ]);

            $citizenRequest = CitizenRequest::where('request_number', $validated['request_number'])
                ->where('cin', $validated['cin'])
                ->with(['user', 'service', 'assignedTo', 'messages'])
                ->first();

            return view('public.request-tracking.index', [
                'citizenRequest' => $citizenRequest,
                'request_number' => $validated['request_number'],
                'cin' => $validated['cin'],
            ]);
        }

        return view('public.request-tracking.index', [
            'citizenRequest' => null,
            'request_number' => null,
            'cin' => null,
        ]);
    }
}
