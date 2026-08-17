<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of news
     */
    public function index()
    {
        $news = Actualite::published()
            ->latest()
            ->paginate(12);

        return view('frontend.news.index', compact('news'));
    }

    /**
     * Display the specified news
     */
    public function show($slug)
    {
        $news = Actualite::published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment view counter
        $news->incrementViews();

        // Get related news
        $relatedNews = Actualite::published()
            ->where('id', '!=', $news->id)
            ->take(4)
            ->get();

        return view('frontend.news.show', compact('news', 'relatedNews'));
    }

    /**
     * Search for news
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        $news = Actualite::published()
            ->where('titre_' . app()->getLocale(), 'LIKE', "%{$query}%")
            ->orWhere('description_' . app()->getLocale(), 'LIKE', "%{$query}%")
            ->paginate(12);

        return view('frontend.news.search', compact('news', 'query'));
    }
}
