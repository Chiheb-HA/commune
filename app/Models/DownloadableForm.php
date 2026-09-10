<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class DownloadableForm extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_fr', 'title_en', 'title_ar',
        'description_fr', 'description_en', 'description_ar',
        'file_path', 'is_active', 'order',
    ];

    protected $casts = [
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
}
