<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Category extends BaseModel
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = [
        'name_fr',
        'name_en',
        'name_ar',
        'description_fr',
        'description_en',
        'description_ar',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_fr'
            ]
        ];
    }

    // Relations
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Accessors
    public function getNameAttribute(): string
    {
        return $this->name_fr ?? $this->name_en ?? $this->name_ar ?? '';
    }

    /**
     * Check if the categories table exists
     */
    public static function tableExists(): bool
    {
        return Schema::hasTable('categories');
    }
}
