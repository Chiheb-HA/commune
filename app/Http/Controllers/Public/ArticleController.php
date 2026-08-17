<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::published()
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('public.articles.index', compact('articles'));
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
