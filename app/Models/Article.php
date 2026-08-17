<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Article extends BaseModel
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = [
        'title_fr',
        'title_ar',
        'title_en',
        'content_fr',
        'content_ar',
        'content_en',
        'summary_fr',
        'summary_ar',
        'summary_en',
        'slug',
        'status',
        'featured_image',
        'category_id',
        'created_by',
        'updated_by',
        'published_at',
        'views',
        'seo_keywords',
        'seo_meta_description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'published_at' => 'datetime',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
    }

    // Relations
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'cin');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'cin');
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeActive($query)
    {
        return $query->where('status', '!=', 'archived');
    }

    // Accessors for locale-based content
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_fr ?? $this->title_en ?? $this->title_ar ?? '';
    }

    public function getContentAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"content_{$locale}"} ?? $this->content_fr ?? $this->content_en ?? $this->content_ar ?? '';
    }

    public function getFeaturedImageAttribute(): string
    {
        return $this->featured_image ?? '';
    }

    public function getExcerptAttribute(): string
    {
        $locale = app()->getLocale();
        $content = $this->{"summary_{$locale}"} ?? $this->summary_fr ?? $this->summary_en ?? $this->summary_ar ?? '';
        if ($content) {
            return $content;
        }
        $fullContent = $this->{"content_{$locale}"} ?? $this->content_fr ?? $this->content_en ?? $this->content_ar ?? '';
        return Str::limit(strip_tags($fullContent), 150);
    }
}
