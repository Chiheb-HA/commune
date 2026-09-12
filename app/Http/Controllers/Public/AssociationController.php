<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\AssociationRequest;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $associations = Association::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(12)
            ->withQueryString();

        return view('public.associations.index', compact('associations', 'search'));
    }

    public function show(Association $association)
    {
        $association->load(['requests' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }]);

        return view('public.associations.show', compact('association'));
    }

    public function storeRequest(Request $request, Association $association)
    {
        $validated = $request->validate([
            'subject' => 'nullable|string|max:255',
            'subject_fr' => 'nullable|string|max:255',
            'subject_en' => 'nullable|string|max:255',
            'subject_ar' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        $locale = app()->getLocale();
        $subject = $validated['subject'] ?? null;

        $association->requests()->create([
            'subject_fr' => $validated['subject_fr'] ?? ($locale === 'fr' ? $subject : null),
            'subject_en' => $validated['subject_en'] ?? ($locale === 'en' ? $subject : null),
            'subject_ar' => $validated['subject_ar'] ?? ($locale === 'ar' ? $subject : null),
            'description' => $validated['description'],
            'status' => 'pending',
        ]);

        return redirect()->back()
            ->with('success', __('messages.association_request_submitted_successfully'));
    }

    public function exportCsv()
    {
        $associations = Association::orderBy('name')->get();

        return response()->streamDownload(function () use ($associations) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Name', 'Matricule', 'Interest Area', 'Email', 'Phone']);
            foreach ($associations as $association) {
                fputcsv($handle, [$association->name, $association->matricule, $association->interest_area, $association->email, $association->president_phone]);
            }
            fclose($handle);
        }, 'associations.csv', ['Content-Type' => 'text/csv']);
    }
}