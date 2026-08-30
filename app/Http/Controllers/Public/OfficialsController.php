<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Official;
use App\Models\Department;

class OfficialsController extends Controller
{
    public function index()
    {
        $officials = Official::active()
            ->with(['user', 'department'])
            ->orderBy('department_id')
            ->orderBy('created_at', 'desc')
            ->get();

        $departments = Department::active()
            ->orderBy('order', 'asc')
            ->orderBy('name_fr', 'asc')
            ->get();

        return view('public.officials.index', compact('officials', 'departments'));
    }
}
