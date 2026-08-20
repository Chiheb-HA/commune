<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\CitizenRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RequestController extends Controller
{
    /**
     * Display a listing of the citizen's requests.
     */
    public function index(): View
    {
        $requests = CitizenRequest::where('user_id', auth()->user()->cin)
            ->latest()
            ->paginate(10);

        return view('citizen.requests.index', compact('requests'));
    }

    /**
     * Display the specified request.
     */
    public function show(CitizenRequest $request): View
    {
        // Ensure the user can only view their own requests
        if ($request->user_id !== auth()->user()->cin) {
            abort(403);
        }

        $request->load('documents');

        return view('citizen.requests.show', compact('request'));
    }
}
