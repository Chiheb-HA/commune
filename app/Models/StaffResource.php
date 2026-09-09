<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffResource extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_fr',
        'title_en',
        'title_ar',
        'description_fr',
        'description_en',
        'description_ar',
        'type',
        'file_path',
        'external_link',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
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

    public function getTypeLabelAttribute(): string
    {
        $labels = [
            'guide' => 'Guide',
            'formation' => 'Formation',
            'assistance_technique' => 'Assistance Technique',
        ];
        return $labels[$this->type] ?? ucfirst($this->type);
    }
}
