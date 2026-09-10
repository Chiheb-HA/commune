<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ProcurementNotice;
use Illuminate\Http\Request;

class ProcurementNoticeController extends Controller
{
    public function index(Request $request)
    {
        $notices = ProcurementNotice::active()
            ->when($request->filled('type'), fn ($query) => $query->where('type', $request->string('type')))
            ->orderByDesc('publication_date')
            ->orderBy('order')
            ->paginate(12)
            ->withQueryString();

        return view('public.procurement-notices.index', compact('notices'));
    }
}
