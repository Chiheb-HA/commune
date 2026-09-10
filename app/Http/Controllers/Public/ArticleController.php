<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('public.articles.index', compact('articles'));
    }

    public function byCategory($category)
    {
        $normalized = Str::slug($category);

        $category = Category::where(function ($query) use ($normalized, $category) {
            $query->where('slug', $normalized)
                ->orWhere('slug', Str::slug('Regulations'))
                ->orWhere('slug', Str::slug('Réglementation'))
                ->orWhere('name_en', 'like', '%' . $category . '%')
                ->orWhere('name_fr', 'like', '%' . $category . '%');
        })->firstOrFail();

        $articles = Article::published()
            ->where('category_id', $category->id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('public.articles.index', compact('articles', 'category'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->published()
            ->first();

        if (!$article) {
            abort(404);
        }

        $article->increment('views_count');

        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('public.articles.show', compact('article', 'relatedArticles'));
    }

    public function share($slug, string $network): RedirectResponse
    {
        $article = Article::published()->where('slug', $slug)->firstOrFail();
        $article->increment('shares_count');
        $url = route('articles.show', $article->slug);

        $target = match ($network) {
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url),
            'x' => 'https://twitter.com/intent/tweet?url=' . urlencode($url) . '&text=' . urlencode($article->title),
            'email' => 'mailto:?subject=' . urlencode($article->title) . '&body=' . urlencode($url),
            default => $url,
        };

        return str_starts_with($target, 'http') ? redirect()->away($target) : redirect($target);
    }
}
