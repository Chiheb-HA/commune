<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TelephoneDirectory extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'telephone_directory';

    protected $fillable = [
        'name_fr',
        'name_en',
        'name_ar',
        'phone',
        'extension',
        'email',
        'department',
        'service',
        'type',
        'description',
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
    public function getNameAttribute(): string
    {
        return $this->name_fr ?? $this->name_en ?? $this->name_ar;
    }
}
