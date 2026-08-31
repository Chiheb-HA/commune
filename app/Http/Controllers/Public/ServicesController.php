<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\MunicipalService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display all municipal services (authorizations/demarches).
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $servicesQuery = MunicipalService::active()
            ->orderBy('order', 'asc')
            ->orderBy('name_fr', 'asc');

        if ($search) {
            $servicesQuery->where(function ($q) use ($search) {
                $q->where('name_fr', 'like', "%{$search}%")
                    ->orWhere('name_en', 'like', "%{$search}%")
                    ->orWhere('name_ar', 'like', "%{$search}%")
                    ->orWhere('description_fr', 'like', "%{$search}%")
                    ->orWhere('description_en', 'like', "%{$search}%")
                    ->orWhere('description_ar', 'like', "%{$search}%");
            });
        }

        $services = $servicesQuery->get();

        return view('public.services.index', compact('services', 'search'));
    }

    /**
     * Display a single service/authorization with full details.
     */
    public function show($slug)
    {
        $service = MunicipalService::where('slug', $slug)
            ->active()
            ->firstOrFail();

        return view('public.services.show', compact('service'));
    }
}
