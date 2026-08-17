<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Pagination\Paginator;

class ArticleService
{
    public function getPublished($perPage = 15)
    {
        return Article::published()
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);
    }

    public function getByCategory($categoryId, $perPage = 15)
    {
        return Article::published()
            ->where('category_id', $categoryId)
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);
    }

    public function getRecent($limit = 10)
    {
        return Article::published()
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public function getFeatured($limit = 5)
    {
        return Article::published()
            ->orderBy('views', 'desc')
            ->limit($limit)
            ->get();
    }

    public function search($query, $perPage = 15)
    {
        return Article::published()
            ->where(function ($q) use ($query) {
                $q->where('title_fr', 'like', "%{$query}%")
                  ->orWhere('title_en', 'like', "%{$query}%")
                  ->orWhere('title_ar', 'like', "%{$query}%")
                  ->orWhere('content_fr', 'like', "%{$query}%")
                  ->orWhere('content_en', 'like', "%{$query}%");
            })
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);
    }

    public function getBySlug($slug)
    {
        $article = Article::published()
            ->where('slug', $slug)
            ->first();

        if ($article) {
            $article->increment('views');
        }

        return $article;
    }

    public function create(array $data)
    {
        $data['created_by'] = auth()->id();
        $data['status'] = 'draft';

        if (isset($data['publish']) && $data['publish']) {
            $data['status'] = 'published';
            $data['published_at'] = now();
        }

        return Article::create($data);
    }

    public function update(Article $article, array $data)
    {
        if (isset($data['publish']) && $data['publish'] && $article->status !== 'published') {
            $data['status'] = 'published';
            $data['published_at'] = now();
        }

        $data['updated_by'] = auth()->id();
        $article->update($data);

        return $article;
    }

    public function publish(Article $article)
    {
        return $article->update([
            'status' => 'published',
            'published_at' => now(),
        ]);
    }

    public function archive(Article $article)
    {
        return $article->update(['status' => 'archived']);
    }
}
