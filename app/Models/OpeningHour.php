<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpeningHour extends BaseModel
{
    use HasFactory;

    protected $table = 'opening_hours';

    protected $fillable = [
        'department_id',
        'day_of_week',
        'opening_time',
        'closing_time',
        'is_closed',
        'notes',
    ];

    protected $casts = [
        'is_closed' => 'boolean',
    ];

    // Relations
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
