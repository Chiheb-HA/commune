<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Galerie;

class GalleryController extends Controller
{
    /**
     * Display a listing of galleries
     */
    public function index()
    {
        $galleries = Galerie::published()
            ->paginate(12);

        return view('frontend.galleries.index', compact('galleries'));
    }

    /**
     * Display photo galleries
     */
    public function photos()
    {
        $galleries = Galerie::published()
            ->photos()
            ->paginate(12);

        return view('frontend.galleries.photos', compact('galleries'));
    }

    /**
     * Display video galleries (WebTV)
     */
    public function webtv()
    {
        $galleries = Galerie::published()
            ->videos()
            ->paginate(12);

        return view('frontend.galleries.webtv', compact('galleries'));
    }

    /**
     * Display the specified gallery
     */
    public function show($slug)
    {
        $gallery = Galerie::published()
            ->where('slug', $slug)
            ->firstOrFail();

        return view('frontend.galleries.show', compact('gallery'));
    }
}
