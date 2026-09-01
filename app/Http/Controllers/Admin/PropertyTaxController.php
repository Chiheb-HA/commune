<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyTaxRecord;
use Illuminate\Http\Request;

class PropertyTaxController extends Controller
{
    public function index()
    {
        $taxRecords = PropertyTaxRecord::orderBy('created_at', 'desc')->get();

        return view('admin.property-taxes.index', compact('taxRecords'));
    }

    public function create()
    {
        return view('admin.property-taxes.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cin' => 'required|string|max:8',
            'property_reference' => 'required|string|max:255',
            'tax_type' => 'required|in:TIB,TNB',
            'fiscal_year' => 'required|string|max:10',
            'amount_due' => 'required|numeric|min:0',
            'amount_paid' => 'nullable|numeric|min:0',
            'status' => 'required|in:pending,partial,paid,overdue',
            'due_date' => 'required|date',
        ]);

        PropertyTaxRecord::create($validated);

        return redirect()->route('admin.property-taxes.index')
            ->with('success', 'Property tax record created successfully');
    }

    public function edit(PropertyTaxRecord $propertyTax)
    {
        return view('admin.property-taxes.form', compact('propertyTax'));
    }

    public function update(Request $request, PropertyTaxRecord $propertyTax)
    {
        $validated = $request->validate([
            'cin' => 'required|string|max:8',
            'property_reference' => 'required|string|max:255',
            'tax_type' => 'required|in:TIB,TNB',
            'fiscal_year' => 'required|string|max:10',
            'amount_due' => 'required|numeric|min:0',
            'amount_paid' => 'nullable|numeric|min:0',
            'status' => 'required|in:pending,partial,paid,overdue',
            'due_date' => 'required|date',
        ]);

        $propertyTax->update($validated);

        return redirect()->route('admin.property-taxes.index')
            ->with('success', 'Property tax record updated successfully');
    }

    public function destroy(PropertyTaxRecord $propertyTax)
    {
        $propertyTax->delete();

        return redirect()->route('admin.property-taxes.index')
            ->with('success', 'Property tax record deleted successfully');
    }
}
