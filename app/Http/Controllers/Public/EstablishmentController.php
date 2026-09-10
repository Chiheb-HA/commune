<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Establishment;

class EstablishmentController extends Controller
{
    public function index()
    {
        $establishments = Establishment::active()->orderBy('order')->orderBy('name_fr')->get();
        return view('public.establishments.index', compact('establishments'));
    }
}
