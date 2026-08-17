<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::published()
            ->latest('published_at')
            ->paginate(12);

        return view('public.news.index', compact('news'));
    }

    public function show($slug)
    {
        $newsItem = News::where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (!$newsItem) {
            abort(404);
        }

        // Increment view count
        $newsItem->increment('views');

        return view('public.news.show', compact('newsItem'));
    }
}
