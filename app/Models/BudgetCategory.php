<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetCategory extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'budget_categories';

    protected $fillable = [
        'name_fr',
        'name_en',
        'name_ar',
        'code',
        'description_fr',
        'description_en',
        'description_ar',
        'type',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relations
    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class);
    }

    public function revenues(): HasMany
    {
        return $this->hasMany(Revenue::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeExpenditure($query)
    {
        return $query->where('type', 'expenditure');
    }

    public function scopeRevenue($query)
    {
        return $query->where('type', 'revenue');
    }

    // Accessors
    public function getNameAttribute(): string
    {
        return $this->name_fr ?? $this->name_en ?? $this->name_ar;
    }
}
