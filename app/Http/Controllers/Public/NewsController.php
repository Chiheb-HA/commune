<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
        $newsItem->increment('views_count');

        return view('public.news.show', compact('newsItem'));
    }

    public function share($slug, string $network): RedirectResponse
    {
        $newsItem = News::published()->where('slug', $slug)->firstOrFail();
        $newsItem->increment('shares_count');
        $url = route('news.show', $newsItem->slug);

        $target = match ($network) {
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url),
            'x' => 'https://twitter.com/intent/tweet?url=' . urlencode($url) . '&text=' . urlencode($newsItem->title),
            'email' => 'mailto:?subject=' . urlencode($newsItem->title) . '&body=' . urlencode($url),
            default => $url,
        };

        return str_starts_with($target, 'http') ? redirect()->away($target) : redirect($target);
    }
}
