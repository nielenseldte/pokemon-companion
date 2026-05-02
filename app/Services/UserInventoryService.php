<?php

namespace App\Services;

use App\Models\Card;
use App\Models\User;

class UserInventoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getCards(User $user)
    {
        $cardIds = $user->userCards()
            ->pluck('card_id');

        return Card::query()
            ->whereIn('_id', $cardIds);
    }
}
