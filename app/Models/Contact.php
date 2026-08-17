<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'contacts';

    protected $fillable = [
        'name',
        'adresse_fr',
        'adresse_ar',
        'adresse_en',
        'tel',
        'fax',
        'email',
        'description_fr',
        'description_ar',
        'description_en',
        'service_fr',
        'service_ar',
        'service_en',
        'slug',
        'status',
        'featured',
        'creerPar',
        'modifierPar',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'featured' => 'boolean',
    ];

    /**
     * Get the creator
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creerPar', 'cin');
    }

    /**
     * Scope to get published contacts
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'PUBLISHED');
    }

    /**
     * Get the address in the specified language
     */
    public function getAddressIn($language = 'fr')
    {
        $field = "adresse_{$language}";
        return $this->$field ?? $this->adresse_fr;
    }

    /**
     * Get the service name in the specified language
     */
    public function getServiceIn($language = 'fr')
    {
        $field = "service_{$language}";
        return $this->$field ?? $this->service_fr;
    }
}
