<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $primaryKey = 'cin';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'cin',
        'phone',
        'address',
        'city',
        'postal_code',
        'country',
        'profile_picture',
        'status',
        'user_type',
        'department',
        'position',
        'password',
        'notify_on_new_request',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relations
    public function citizenRequests()
    {
        return $this->hasMany(CitizenRequest::class, 'user_id', 'cin');
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'user_id', 'cin');
    }

    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'from_user_id', 'cin');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'to_user_id', 'cin');
    }

    public function eventRegistrations()
    {
        return $this->hasMany(EventRegistration::class, 'user_id', 'cin');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'created_by', 'cin');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'created_by', 'cin');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCitizens($query)
    {
        return $query->where('user_type', 'citizen');
    }

    public function scopeOfficials($query)
    {
        return $query->where('user_type', 'official');
    }

    public function scopeAdmins($query)
    {
        return $query->where('user_type', 'admin');
    }

    public function scopeEditors($query)
    {
        return $query->where('user_type', 'editor');
    }
}
