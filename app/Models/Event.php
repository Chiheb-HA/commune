<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Event extends BaseModel
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $table = 'events';

    protected $fillable = [
        'title_fr',
        'title_en',
        'title_ar',
        'description_fr',
        'description_en',
        'description_ar',
        'location_fr',
        'location_en',
        'location_ar',
        'start_date',
        'end_date',
        'featured_image',
        'created_by',
        'status',
        'capacity',
        'registrations',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_fr'
            ]
        ];
    }

    // Relations
    public function organizer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'cin');
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>', now())->where('status', '!=', 'cancelled');
    }

    public function scopePast($query)
    {
        return $query->where('start_date', '<', now());
    }

    // Accessors
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_fr ?? $this->title_en ?? $this->title_ar ?? '';
    }

    public function getDescriptionAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"} ?? $this->description_fr ?? $this->description_en ?? $this->description_ar ?? '';
    }

    public function getLocationAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"location_{$locale}"} ?? $this->location_fr ?? $this->location_en ?? $this->location_ar ?? '';
    }

    public function getAvailableSlotsAttribute(): ?int
    {
        if (!$this->capacity) return null;
        return max(0, $this->capacity - $this->registrations);
    }

    /**
     * Check if the events table exists
     */
    public static function tableExists(): bool
    {
        return Schema::hasTable('events');
    }
}
