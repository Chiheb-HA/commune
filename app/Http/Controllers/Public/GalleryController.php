<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $galleries = Gallery::published()
            ->with('images')
            ->latest()
            ->paginate(12);

        return view('public.galleries.index', compact('galleries'));
    }

    public function show($id)
    {
        $gallery = Gallery::with('images')
            ->where('id', $id)
            ->where('status', 'published')
            ->first();

        if (!$gallery) {
            abort(404);
        }

        return view('public.galleries.show', compact('gallery'));
    }
}
