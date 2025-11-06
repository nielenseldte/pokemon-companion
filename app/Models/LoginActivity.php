<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoginActivity extends Model
{
    //
    protected $table = 'login_activities';
    protected $fillable = [
        'user_id',
        'email',
        'successful',
        'ip_address',
        'user_agent',
        'device',
        'platform',
        'browser'
    ];

    protected $casts = [
        'successful' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
