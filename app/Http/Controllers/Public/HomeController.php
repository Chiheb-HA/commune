<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\News;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recentArticles = Article::whereIn('status', ['PUBLISHED', 'published'])
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        $recentNews = News::where('status', 'published')
            ->latest()
            ->limit(6)
            ->get();
        
        $upcomingEvents = Event::where('status', 'published')
            ->where('start_date', '>', now())
            ->orderBy('start_date', 'asc')
            ->limit(4)
            ->get();

        return view('public.home', compact(
            'recentArticles',
            'recentNews',
            'upcomingEvents'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $articles = Article::whereIn('status', ['PUBLISHED', 'published'])
            ->where(function ($q) use ($query) {
                $locale = app()->getLocale();
                $titleField = $locale === 'en' ? 'title_en' : ($locale === 'ar' ? 'title_ar' : "titre_{$locale}");
                $contentField = $locale === 'en' ? 'content_en' : ($locale === 'ar' ? 'content_ar' : "contenu_{$locale}");
                $q->where($titleField, 'like', "%{$query}%")
                  ->orWhere($contentField, 'like', "%{$query}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        $news = News::where('status', 'published')
            ->where(function ($q) use ($query) {
                $locale = app()->getLocale();
                $titleField = "title_{$locale}";
                $contentField = "content_{$locale}";
                
                $q->where($titleField, 'like', "%{$query}%")
                  ->orWhere($contentField, 'like', "%{$query}%");
            })
            ->latest()
            ->paginate(12);

        return view('public.search', compact('articles', 'news', 'query'));
    }
}
