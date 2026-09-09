<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::active()
            ->orderBy('category')
            ->orderBy('order')
            ->get()
            ->groupBy('category');

        return view('public.faqs.index', compact('faqs'));
    }
}
