<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamCard extends Model
{
    protected $table = 'team_cards';
    protected $fillable = ['team_id', 'user_cards_id', 'slot'];
    public function userCard(): BelongsTo
    {
        return $this->belongsTo(UserCard::class);
    }

    public function card()
    {
        return $this->userCard ? $this->userCard->card() : null;
    }
}
