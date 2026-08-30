<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MunicipalService;
use Illuminate\Http\Request;

class MunicipalServiceController extends Controller
{
    public function index()
    {
        $services = MunicipalService::orderBy('order', 'asc')
            ->orderBy('name_ar', 'asc')
            ->get();

        return view('admin.municipal-services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.municipal-services.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'icon' => 'nullable|string',
            'requirements_ar' => 'nullable|string',
            'requirements_fr' => 'nullable|string',
            'requirements_en' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'documents_required_ar' => 'nullable|string',
            'documents_required_fr' => 'nullable|string',
            'documents_required_en' => 'nullable|string',
            'processing_time' => 'nullable|string|max:100',
            'cost' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        MunicipalService::create($validated);

        return redirect()->route('admin.municipal-services.index')
            ->with('success', 'Service created successfully');
    }

    public function edit(MunicipalService $municipalService)
    {
        return view('admin.municipal-services.form', compact('municipalService'));
    }

    public function update(Request $request, MunicipalService $municipalService)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'icon' => 'nullable|string',
            'requirements_ar' => 'nullable|string',
            'requirements_fr' => 'nullable|string',
            'requirements_en' => 'nullable|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'documents_required_ar' => 'nullable|string',
            'documents_required_fr' => 'nullable|string',
            'documents_required_en' => 'nullable|string',
            'processing_time' => 'nullable|string|max:100',
            'cost' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $municipalService->update($validated);

        return redirect()->route('admin.municipal-services.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy(MunicipalService $municipalService)
    {
        $municipalService->delete();

        return redirect()->route('admin.municipal-services.index')
            ->with('success', 'Service deleted successfully');
    }

    public function toggleStatus(MunicipalService $municipalService)
    {
        $municipalService->update(['is_active' => !$municipalService->is_active]);

        return redirect()->back()->with('success', 'Service status updated successfully');
    }
}
