<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CouncilSession extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'session_date',
        'type',
        'committee_name',
        'minutes_document',
        'status',
    ];

    protected $casts = [
        'session_date' => 'date',
    ];
}