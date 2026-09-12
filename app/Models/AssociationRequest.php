<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssociationRequest extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'association_id',
        'subject_fr',
        'subject_en',
        'subject_ar',
        'description',
        'status',
        'response',
        'responded_at',
    ];

    protected $casts = [
        'responded_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function association(): BelongsTo
    {
        return $this->belongsTo(Association::class);
    }
}
