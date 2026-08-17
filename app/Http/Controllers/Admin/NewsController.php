<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::with('author')
            ->orderBy('published_at', 'desc')
            ->paginate(20);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'content_fr' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'publish' => 'nullable|boolean',
        ]);

        $news = News::create([
            ...$validated,
            'created_by' => auth()->id(),
            'status' => isset($validated['publish']) && $validated['publish'] ? 'published' : 'draft',
            'published_at' => isset($validated['publish']) && $validated['publish'] ? now() : null,
        ]);

        return redirect()->route('admin.news.index')
            ->with('success', 'News created successfully');
    }

    public function edit(News $news)
    {
        return view('admin.news.form', ['news' => $news]);
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title_fr' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'content_fr' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'featured_image' => 'nullable|image|max:2048',
            'publish' => 'nullable|boolean',
        ]);

        if (isset($validated['publish']) && $validated['publish'] && $news->status !== 'published') {
            $validated['status'] = 'published';
            $validated['published_at'] = now();
        }

        $news->update($validated);

        return redirect()->route('admin.news.edit', $news)
            ->with('success', 'News updated successfully');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'News deleted successfully');
    }
}
