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
}