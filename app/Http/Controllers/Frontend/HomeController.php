<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Galerie;
use App\Models\Statistique;
use App\Models\AccueilComposant;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        $news = Actualite::published()
            ->featured()
            ->latest()
            ->take(6)
            ->get();

        $upcomingEvents = Evenement::published()
            ->upcoming()
            ->take(4)
            ->get();

        $galleries = Galerie::published()
            ->take(3)
            ->get();

        $statistics = Statistique::published()
            ->featured()
            ->take(2)
            ->get();

        $homeComponents = AccueilComposant::published()
            ->ordered()
            ->get();

        return view('frontend.home', compact(
            'news',
            'upcomingEvents',
            'galleries',
            'statistics',
            'homeComponents'
        ));
    }

    /**
     * Display about page
     */
    public function about()
    {
        return view('frontend.about');
    }

    /**
     * Display services page
     */
    public function services()
    {
        return view('frontend.services');
    }

    /**
     * Display contact page
     */
    public function contact()
    {
        return view('frontend.contact');
    }
}
