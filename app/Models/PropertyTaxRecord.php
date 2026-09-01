<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyTaxRecord extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'property_tax_records';

    protected $fillable = [
        'cin',
        'property_reference',
        'tax_type',
        'fiscal_year',
        'amount_due',
        'amount_paid',
        'status',
        'due_date',
    ];

    protected $casts = [
        'amount_due' => 'decimal:2',
        'amount_paid' => 'decimal:2',
        'due_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Scopes
    public function scopeByCin($query, $cin)
    {
        return $query->where('cin', $cin);
    }

    public function scopeByPropertyReference($query, $propertyReference)
    {
        return $query->where('property_reference', $propertyReference);
    }

    public function scopeByTaxType($query, $taxType)
    {
        return $query->where('tax_type', $taxType);
    }

    public function scopeByFiscalYear($query, $fiscalYear)
    {
        return $query->where('fiscal_year', $fiscalYear);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopePaid($query)
    {
        return $query->where('status', 'paid');
    }

    public function scopeOverdue($query)
    {
        return $query->where('status', 'overdue')
            ->orWhere(function ($q) {
                $q->where('status', 'pending')
                    ->where('due_date', '<', now());
            });
    }
}
