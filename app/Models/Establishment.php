<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Establishment extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_fr', 'name_en', 'name_ar', 'type', 'address', 'phone', 'is_active', 'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getNameAttribute(): string
    {
        return $this->getTranslatableContent('name') ?? '';
    }
}
