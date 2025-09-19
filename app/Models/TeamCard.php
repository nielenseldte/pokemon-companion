<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamCard extends Model
{
    public function userCard(): BelongsTo
    {
        return $this->belongsTo(UserCard::class);
    }

    public function card()
    {
        return $this->userCard ? $this->userCard->card() : null;
    }
}
