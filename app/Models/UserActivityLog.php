<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityLog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['user_id', 'action', 'ip_address', 'user_agent', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'cin');
    }
}
