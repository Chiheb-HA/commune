<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacilityReservation extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'facility_type',
        'citizen_name',
        'citizen_phone',
        'citizen_email',
        'requested_date',
        'status',
        'notes',
        'is_active',
        'order',
    ];

    protected $casts = [
        'requested_date' => 'date',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
