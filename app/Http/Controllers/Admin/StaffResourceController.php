<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaffResource;
use Illuminate\Http\Request;

class StaffResourceController extends Controller
{
    public function index()
    {
        $staffResources = StaffResource::orderBy('type')
            ->orderBy('order')
            ->paginate(20);

        return view('admin.staff-resources.index', compact('staffResources'));
    }

    public function create()
    {
        return view('admin.staff-resources.form', ['staffResource' => new StaffResource()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'type' => 'required|in:guide,formation,assistance_technique',
            'file_path' => 'nullable|string|max:255',
            'external_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $staffResource = StaffResource::create($validated);

        return redirect()->route('admin.staff-resources.index')
            ->with('success', 'Staff resource created successfully');
    }

    public function edit(StaffResource $staffResource)
    {
        return view('admin.staff-resources.form', ['staffResource' => $staffResource]);
    }

    public function update(Request $request, StaffResource $staffResource)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'type' => 'required|in:guide,formation,assistance_technique',
            'file_path' => 'nullable|string|max:255',
            'external_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $staffResource->update($validated);

        return redirect()->route('admin.staff-resources.index')
            ->with('success', 'Staff resource updated successfully');
    }

    public function destroy(StaffResource $staffResource)
    {
        $staffResource->delete();

        return redirect()->route('admin.staff-resources.index')
            ->with('success', 'Staff resource deleted successfully');
    }
}
