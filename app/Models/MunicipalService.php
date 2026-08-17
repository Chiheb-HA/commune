<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MunicipalService extends BaseModel
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $table = 'municipal_services';

    protected $fillable = [
        'name_fr',
        'name_en',
        'name_ar',
        'description_fr',
        'description_en',
        'description_ar',
        'icon',
        'requirements_fr',
        'requirements_en',
        'requirements_ar',
        'phone',
        'email',
        'documents_required_fr',
        'documents_required_en',
        'documents_required_ar',
        'processing_time',
        'cost',
        'is_active',
        'order',
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
    public function requests(): HasMany
    {
        return $this->hasMany(CitizenRequest::class, 'service_id');
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
}
