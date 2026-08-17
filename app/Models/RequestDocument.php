<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestDocument extends BaseModel
{
    use HasFactory;

    protected $table = 'request_documents';

    protected $fillable = [
        'citizen_request_id',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'uploaded_by',
    ];

    // Relations
    public function request(): BelongsTo
    {
        return $this->belongsTo(CitizenRequest::class, 'citizen_request_id');
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by', 'cin');
    }
}
