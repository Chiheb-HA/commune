<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Association;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    public function index(Request $request)
    {
        $associations = Association::query()
            ->when($request->query('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->get();

        return view('admin.associations.index', compact('associations'));
    }

    public function create()
    {
        return view('admin.associations.form');
    }

    public function store(Request $request)
    {
        Association::create($this->validatedData($request));

        return redirect()->route('admin.associations.index')
            ->with('success', __('messages.association_created'));
    }

    public function edit(Association $association)
    {
        return view('admin.associations.form', compact('association'));
    }

    public function update(Request $request, Association $association)
    {
        $association->update($this->validatedData($request, $association));

        return redirect()->route('admin.associations.index')
            ->with('success', __('messages.association_updated'));
    }

    public function destroy(Association $association)
    {
        $association->delete();

        return redirect()->route('admin.associations.index')
            ->with('success', __('messages.association_deleted'));
    }

    private function validatedData(Request $request, ?Association $association = null): array
    {
        return $request->validate([
            'matricule' => 'required|string|max:255|unique:associations,matricule,' . ($association?->id ?? 'NULL'),
            'authorization_number' => 'nullable|string|max:255',
            'authorization_date' => 'nullable|date',
            'name' => 'required|string|max:255',
            'interest_area' => 'nullable|string|max:255',
            'correspondence_address' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'president_name' => 'nullable|string|max:255',
            'president_phone' => 'nullable|string|max:50',
            'president_fax' => 'nullable|string|max:50',
            'contact_person_name' => 'nullable|string|max:255',
            'contact_person_role' => 'nullable|string|max:255',
            'contact_person_phone' => 'nullable|string|max:50',
            'member_count' => 'nullable|integer|min:0',
        ]);
    }
}