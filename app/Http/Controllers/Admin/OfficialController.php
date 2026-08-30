<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Official;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficialController extends Controller
{
    public function index()
    {
        $officials = Official::with(['user', 'department'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.officials.index', compact('officials'));
    }

    public function create()
    {
        $departments = Department::active()->get();
        $users = User::whereDoesntHave('official')->get();

        return view('admin.officials.form', compact('departments', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,cin',
            'department_id' => 'required|exists:departments,id',
            'position_ar' => 'required|string|max:255',
            'position_fr' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'office_location' => 'nullable|string|max:255',
            'office_number' => 'nullable|string|max:50',
            'bio_ar' => 'nullable|string',
            'bio_fr' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'specializations' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('officials', 'public');
        }

        Official::create($validated);

        return redirect()->route('admin.officials.index')
            ->with('success', 'Official created successfully');
    }

    public function edit(Official $official)
    {
        $departments = Department::active()->get();
        $users = User::all();

        return view('admin.officials.form', compact('official', 'departments', 'users'));
    }

    public function update(Request $request, Official $official)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,cin',
            'department_id' => 'required|exists:departments,id',
            'position_ar' => 'required|string|max:255',
            'position_fr' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'office_location' => 'nullable|string|max:255',
            'office_number' => 'nullable|string|max:50',
            'bio_ar' => 'nullable|string',
            'bio_fr' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'specializations' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($official->photo) {
                Storage::disk('public')->delete($official->photo);
            }
            $validated['photo'] = $request->file('photo')->store('officials', 'public');
        }

        $official->update($validated);

        return redirect()->route('admin.officials.index')
            ->with('success', 'Official updated successfully');
    }

    public function destroy(Official $official)
    {
        // Delete photo if exists
        if ($official->photo) {
            Storage::disk('public')->delete($official->photo);
        }

        $official->delete();

        return redirect()->route('admin.officials.index')
            ->with('success', 'Official deleted successfully');
    }

    public function toggleStatus(Official $official)
    {
        $official->update(['status' => $official->status === 'active' ? 'inactive' : 'active']);

        return redirect()->back()->with('success', 'Official status updated successfully');
    }
}
