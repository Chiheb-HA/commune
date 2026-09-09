<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\StaffResource;
use Illuminate\Http\Request;

class StaffResourceController extends Controller
{
    public function index()
    {
        $staffResources = StaffResource::active()
            ->orderBy('type')
            ->orderBy('order')
            ->get()
            ->groupBy('type');

        return view('public.staff-resources.index', compact('staffResources'));
    }
}
