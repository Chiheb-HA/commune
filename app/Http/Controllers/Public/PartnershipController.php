<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index()
    {
        $partnerships = Partnership::active()
            ->orderBy('order')
            ->paginate(12);

        return view('public.partnerships.index', compact('partnerships'));
    }
}
