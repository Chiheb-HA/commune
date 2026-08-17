<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->paginate(20);
        $categories = Category::all();

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.articles.form', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre_fr' => 'required|string|max:255',
            'titre_en' => 'required|string|max:255',
            'titre_ar' => 'required|string|max:255',
            'contenu_fr' => 'required|string',
            'contenu_en' => 'required|string',
            'contenu_ar' => 'required|string',
            'images' => 'nullable|string',
            'fichiers' => 'nullable|string',
            'status' => 'required|in:PUBLISHED,ARCHIVE',
            'featured' => 'nullable|boolean',
        ]);

        Article::create($validated);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article created successfully');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('admin.articles.form', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'titre_fr' => 'required|string|max:255',
            'titre_en' => 'required|string|max:255',
            'titre_ar' => 'required|string|max:255',
            'contenu_fr' => 'required|string',
            'contenu_en' => 'required|string',
            'contenu_ar' => 'required|string',
            'images' => 'nullable|string',
            'fichiers' => 'nullable|string',
            'status' => 'required|in:PUBLISHED,ARCHIVE',
            'featured' => 'nullable|boolean',
        ]);

        $article->update($validated);

        return redirect()->route('admin.articles.edit', $article)
            ->with('success', 'Article updated successfully');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article deleted successfully');
    }

    public function publish(Article $article)
    {
        $article->update(['status' => 'PUBLISHED']);

        return redirect()->back()->with('success', 'Article published successfully');
    }

    public function archive(Article $article)
    {
        $article->update(['status' => 'ARCHIVE']);

        return redirect()->back()->with('success', 'Article archived successfully');
    }
}
