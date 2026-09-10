<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\FundingSource;
use Illuminate\Http\Request;

class FundingSourceController extends Controller
{
    public function index()
    {
        $fundingSources = FundingSource::active()
            ->orderBy('type')
            ->orderBy('order')
            ->get()
            ->groupBy('type');

        return view('public.funding-sources.index', compact('fundingSources'));
    }
}
