<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsletterSubscriber extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'email',
        'is_confirmed',
        'confirmation_token',
        'subscribed_at',
    ];

    protected $casts = [
        'is_confirmed' => 'boolean',
        'subscribed_at' => 'datetime',
    ];

    // Scopes
    public function scopeConfirmed($query)
    {
        return $query->where('is_confirmed', true);
    }
}
