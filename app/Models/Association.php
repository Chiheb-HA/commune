<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Association extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'authorization_number',
        'authorization_date',
        'name',
        'interest_area',
        'correspondence_address',
        'email',
        'president_name',
        'president_phone',
        'president_mobile',
        'president_fax',
        'contact_person_name',
        'contact_person_role',
        'contact_person_phone',
        'contact_person_mobile',
        'member_count',
    ];

    protected $casts = [
        'authorization_date' => 'date',
        'member_count' => 'integer',
    ];

    public function requests(): HasMany
    {
        return $this->hasMany(AssociationRequest::class);
    }
}