<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
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

        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('public.articles.show', compact('article', 'relatedArticles'));
    }
}
