<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\MunicipalService;

class ServicesController extends Controller
{
    public function index()
    {
        $services = MunicipalService::where('is_active', true)
            ->orderBy('order', 'asc')
            ->orderBy('name_fr', 'asc')
            ->get();

        return view('public.services.index', compact('services'));
    }
}
