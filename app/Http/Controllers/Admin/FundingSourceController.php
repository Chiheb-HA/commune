<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FundingSource;
use Illuminate\Http\Request;

class FundingSourceController extends Controller
{
    public function index()
    {
        $fundingSources = FundingSource::orderBy('type')
            ->orderBy('order')
            ->paginate(20);

        return view('admin.funding-sources.index', compact('fundingSources'));
    }

    public function show(FundingSource $fundingSource)
    {
        return redirect()->route('admin.funding-sources.edit', $fundingSource);
    }

    public function create()
    {
        return view('admin.funding-sources.form', ['fundingSource' => new FundingSource()]);
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
            'type' => 'required|in:dotation_non_affectee,dotation_affectee,subvention_exceptionnelle,pret',
            'amount' => 'nullable|numeric|between:0,9999999999.99',
            'fiscal_year' => 'nullable|integer',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $fundingSource = FundingSource::create($validated);

        return redirect()->route('admin.funding-sources.index')
            ->with('success', 'Funding source created successfully');
    }

    public function edit(FundingSource $fundingSource)
    {
        return view('admin.funding-sources.form', ['fundingSource' => $fundingSource]);
    }

    public function update(Request $request, FundingSource $fundingSource)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'type' => 'required|in:dotation_non_affectee,dotation_affectee,subvention_exceptionnelle,pret',
            'amount' => 'nullable|numeric|between:0,9999999999.99',
            'fiscal_year' => 'nullable|integer',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        $fundingSource->update($validated);

        return redirect()->route('admin.funding-sources.index')
            ->with('success', 'Funding source updated successfully');
    }

    public function destroy(FundingSource $fundingSource)
    {
        $fundingSource->delete();

        return redirect()->route('admin.funding-sources.index')
            ->with('success', 'Funding source deleted successfully');
    }
}
