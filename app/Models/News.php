<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends BaseModel
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'title_fr',
        'title_ar',
        'title_en',
        'content_fr',
        'content_ar',
        'content_en',
        'featured_image',
        'slug',
        'status',
        'published_at',
        'views',
        'created_by',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_en'
            ]
        ];
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

    // Relations
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'cin');
    }

    // Accessors for backward compatibility
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
}
