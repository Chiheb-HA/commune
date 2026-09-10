<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Association;
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
        return view('public.associations.show', compact('association'));
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