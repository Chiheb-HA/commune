<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundingSource extends BaseModel
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
        'amount',
        'fiscal_year',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'amount' => 'decimal:2',
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
        return self::getTypeLabel($this->type);
    }

    public static function getTypeLabel(string $type): string
    {
        $labels = [
            'dotation_non_affectee' => 'Dotation Non Affectée',
            'dotation_affectee' => 'Dotation Affectée',
            'subvention_exceptionnelle' => 'Subvention Exceptionnelle',
            'pret' => 'Prêt',
        ];
        return $labels[$type] ?? ucfirst($type);
    }
}
