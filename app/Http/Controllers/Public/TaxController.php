<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PropertyTaxRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class TaxController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $key = 'tax-lookup:' . $request->ip();
            
            if (RateLimiter::tooManyAttempts($key, 10)) {
                return back()->with('error', __('messages.Too many requests. Please try again later.'));
            }

            RateLimiter::hit($key, 60);

            $validated = $request->validate([
                'cin' => 'required|string|max:8',
                'property_reference' => 'required|string|max:255',
            ]);

            $taxRecords = PropertyTaxRecord::where('cin', $validated['cin'])
                ->where('property_reference', $validated['property_reference'])
                ->orderBy('fiscal_year', 'desc')
                ->get();

            return view('public.taxes.index', [
                'taxRecords' => $taxRecords,
                'cin' => $validated['cin'],
                'property_reference' => $validated['property_reference'],
            ]);
        }

        return view('public.taxes.index', [
            'taxRecords' => null,
            'cin' => null,
            'property_reference' => null,
        ]);
    }
}
