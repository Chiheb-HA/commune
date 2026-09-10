<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        $competitions = Competition::active()
            ->orderBy('status')
            ->orderBy('order')
            ->paginate(12);

        return view('public.competitions.index', compact('competitions'));
    }

    public function show($slug)
    {
        $competition = Competition::where('slug', $slug)->firstOrFail();
        return view('public.competitions.show', compact('competition'));
    }
}
