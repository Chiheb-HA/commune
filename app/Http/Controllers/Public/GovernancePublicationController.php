<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\GovernancePublication;
use Illuminate\Http\Request;

class GovernancePublicationController extends Controller
{
    public function index(Request $request)
    {
        $publications = GovernancePublication::active()
            ->when($request->filled('type'), fn ($query) => $query->where('type', $request->string('type')))
            ->orderByDesc('publication_date')
            ->orderBy('order')
            ->paginate(12)
            ->withQueryString();

        return view('public.governance-publications.index', compact('publications'));
    }
}
