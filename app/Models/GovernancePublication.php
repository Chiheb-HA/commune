<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class GovernancePublication extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_fr', 'title_en', 'title_ar',
        'description_fr', 'description_en', 'description_ar',
        'type', 'publication_date', 'attachment_path', 'is_active', 'order',
    ];

    protected $casts = [
        'publication_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getTitleAttribute(): string
    {
        return $this->getTranslatableContent('title') ?? '';
    }

    public function getDescriptionAttribute(): string
    {
        return $this->getTranslatableContent('description') ?? '';
    }

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            'programme_participatif' => 'Programme participatif',
            'consultation_publique' => 'Consultation publique',
            'pai' => 'PAI',
            'pic' => 'PIC',
            'pges' => 'PGES',
            default => ucfirst(str_replace('_', ' ', $this->type)),
        };
    }
}
