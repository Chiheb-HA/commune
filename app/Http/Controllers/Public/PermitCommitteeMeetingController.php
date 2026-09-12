<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PermitCommitteeMeeting;

class PermitCommitteeMeetingController extends Controller
{
    public function index()
    {
        $meetings = PermitCommitteeMeeting::active()
            ->orderBy('meeting_date', 'asc')
            ->paginate(12);

        return view('public.permit-committee-meetings.index', compact('meetings'));
    }
}
