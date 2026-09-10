<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Competition extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'title_fr',
        'title_en',
        'title_ar',
        'description_fr',
        'description_en',
        'description_ar',
        'start_date',
        'end_date',
        'status',
        'attachment_path',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    // Accessors
    public function getTitleAttribute(): string
    {
        return $this->title_fr ?? $this->title_en ?? $this->title_ar;
    }

    public function getDescriptionAttribute(): string
    {
        return $this->description_fr ?? $this->description_en ?? $this->description_ar;
    }

    public function getStatusLabelAttribute(): string
    {
        $labels = [
            'open' => 'Open',
            'closed' => 'Closed',
            'upcoming' => 'Upcoming',
        ];
        return $labels[$this->status] ?? ucfirst($this->status);
    }
}
