<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partnership extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_fr',
        'title_en',
        'title_ar',
        'description_fr',
        'description_en',
        'description_ar',
        'partner_country',
        'partner_city',
        'signed_date',
        'image',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'signed_date' => 'date',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
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
}
