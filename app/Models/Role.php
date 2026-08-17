<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    /**
     * Get all users with this role (through user_roles pivot table)
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id');
    }

    /**
     * Check if role has a specific permission name
     */
    public function hasPermission($permission): bool
    {
        // Voyager stores permissions as JSON in the permissions column
        if (isset($this->permissions)) {
            $permissions = json_decode($this->permissions, true);
            return in_array($permission, $permissions ?? []);
        }
        return false;
    }
}
