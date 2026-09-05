<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\TelephoneDirectory;

class EmergencyContactController extends Controller
{
    public function index()
    {
        $contacts = TelephoneDirectory::active()
            ->orderBy('order')
            ->get()
            ->groupBy('type');

        return view('public.emergency-contacts.index', compact('contacts'));
    }
}