<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermitCommitteeMeeting extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'meeting_date',
        'location',
        'agenda_fr',
        'agenda_en',
        'agenda_ar',
        'is_active',
        'order',
    ];

    protected $casts = [
        'meeting_date' => 'datetime',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
