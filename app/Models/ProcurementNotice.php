<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcurementNotice extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_fr', 'title_en', 'title_ar',
        'description_fr', 'description_en', 'description_ar',
        'type', 'reference_number', 'publication_date', 'deadline_date',
        'attachment_path', 'is_active', 'order',
    ];

    protected $casts = [
        'publication_date' => 'date',
        'deadline_date' => 'date',
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
            'pam' => 'PAM',
            'appel_offres' => 'Appel d\'offres',
            'resultat_designation' => 'Résultat de désignation',
            default => ucfirst(str_replace('_', ' ', $this->type)),
        };
    }
}
