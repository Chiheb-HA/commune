<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index()
    {
        $partnerships = Partnership::orderBy('order')
            ->paginate(20);

        return view('admin.partnerships.index', compact('partnerships'));
    }

    public function create()
    {
        return view('admin.partnerships.form', ['partnership' => new Partnership()]);
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
            'partner_country' => 'nullable|string|max:255',
            'partner_city' => 'nullable|string|max:255',
            'signed_date' => 'nullable|date',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $partnership = Partnership::create($validated);

        return redirect()->route('admin.partnerships.index')
            ->with('success', 'Partnership created successfully');
    }

    public function edit(Partnership $partnership)
    {
        return view('admin.partnerships.form', ['partnership' => $partnership]);
    }

    public function update(Request $request, Partnership $partnership)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'partner_country' => 'nullable|string|max:255',
            'partner_city' => 'nullable|string|max:255',
            'signed_date' => 'nullable|date',
            'image' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $partnership->update($validated);

        return redirect()->route('admin.partnerships.index')
            ->with('success', 'Partnership updated successfully');
    }

    public function destroy(Partnership $partnership)
    {
        $partnership->delete();

        return redirect()->route('admin.partnerships.index')
            ->with('success', 'Partnership deleted successfully');
    }
}
