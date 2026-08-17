<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetAllocation extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'budget_allocations';

    protected $fillable = [
        'budget_id',
        'department_name',
        'allocated_amount',
        'spent_amount',
        'status',
    ];

    protected $casts = [
        'allocated_amount' => 'decimal:2',
        'spent_amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relations
    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class);
    }

    // Scopes
    public function scopeByBudget($query, $budgetId)
    {
        return $query->where('budget_id', $budgetId);
    }
}
