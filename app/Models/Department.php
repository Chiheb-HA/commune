<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Department extends BaseModel
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = [
        'name_fr',
        'name_en',
        'name_ar',
        'description_fr',
        'description_en',
        'description_ar',
        'phone',
        'email',
        'location',
        'building_number',
        'floor',
        'responsibilities_fr',
        'responsibilities_en',
        'responsibilities_ar',
        'head_id',
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
    public function head(): BelongsTo
    {
        return $this->belongsTo(User::class, 'head_id', 'cin');
    }

    public function officials(): HasMany
    {
        return $this->hasMany(Official::class);
    }

    public function openingHours(): HasMany
    {
        return $this->hasMany(OpeningHour::class);
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
     * Check if the departments table exists
     */
    public static function tableExists(): bool
    {
        return Schema::hasTable('departments');
    }
}
