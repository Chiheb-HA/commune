<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with('head')
            ->orderBy('order', 'asc')
            ->orderBy('name_ar', 'asc')
            ->get();

        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        $officials = User::whereHas('roles', function($query) {
            $query->whereIn('name', ['admin', 'official']);
        })->get();

        return view('admin.departments.form', compact('officials'));
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
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'location' => 'nullable|string|max:255',
            'building_number' => 'nullable|string|max:50',
            'floor' => 'nullable|string|max:50',
            'responsibilities_ar' => 'nullable|string',
            'responsibilities_fr' => 'nullable|string',
            'responsibilities_en' => 'nullable|string',
            'head_id' => 'nullable|exists:users,cin',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        Department::create($validated);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department created successfully');
    }

    public function edit(Department $department)
    {
        $officials = User::whereHas('roles', function($query) {
            $query->whereIn('name', ['admin', 'official']);
        })->get();

        return view('admin.departments.form', compact('department', 'officials'));
    }

    public function update(Request $request, Department $department)
    {
        $validated = $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'location' => 'nullable|string|max:255',
            'building_number' => 'nullable|string|max:50',
            'floor' => 'nullable|string|max:50',
            'responsibilities_ar' => 'nullable|string',
            'responsibilities_fr' => 'nullable|string',
            'responsibilities_en' => 'nullable|string',
            'head_id' => 'nullable|exists:users,cin',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $department->update($validated);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department updated successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department deleted successfully');
    }

    public function toggleStatus(Department $department)
    {
        $department->update(['is_active' => !$department->is_active]);

        return redirect()->back()->with('success', 'Department status updated successfully');
    }
}
