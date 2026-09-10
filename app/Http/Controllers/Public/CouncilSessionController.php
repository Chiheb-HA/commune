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

    public function exportCsv()
    {
        $sessions = CouncilSession::orderByDesc('session_date')->get();

        return response()->streamDownload(function () use ($sessions) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Title', 'Session Date', 'Type', 'Committee', 'Status']);
            foreach ($sessions as $session) {
                fputcsv($handle, [$session->title, $session->session_date?->toDateString(), $session->type, $session->committee_name, $session->status]);
            }
            fclose($handle);
        }, 'council-sessions.csv', ['Content-Type' => 'text/csv']);
    }
}