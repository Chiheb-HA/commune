<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'image_url',
        'thumbnail_url',
        'title_fr',
        'title_en',
        'title_ar',
        'caption_fr',
        'caption_en',
        'caption_ar',
        'order',
    ];

    // Relations
    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

    // Scopes
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    // Accessors
    public function getTitleAttribute(): string
    {
        return $this->title_fr ?? $this->title_en ?? $this->title_ar ?? '';
    }
}
