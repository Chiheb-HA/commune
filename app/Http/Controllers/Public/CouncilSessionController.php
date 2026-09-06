<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\CouncilSession;

class CouncilSessionController extends Controller
{
    public function index()
    {
        $sessions = CouncilSession::query()
            ->orderByRaw("CASE WHEN status = 'upcoming' THEN 0 ELSE 1 END")
            ->orderByDesc('session_date')
            ->get();

        return view('public.council-sessions.index', compact('sessions'));
    }
}