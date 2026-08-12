<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'status',
        'expires_at'
    ];
}
