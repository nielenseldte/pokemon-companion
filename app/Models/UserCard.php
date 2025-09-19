<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCard extends Model
{
    public function card()
    {
        return Card::find($this->card_id);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
