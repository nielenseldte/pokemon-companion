<?php

namespace App\Actions\Card;

use App\Actions\Action;
use App\Models\UserCard;
use App\Actions\Contracts\ActionInterface;

class RemoveCardFromInventoryAction extends Action implements ActionInterface
{
    public function perform(...$args)
    {
        $card_id = $args[0];

        UserCard::where('card_id', '=', $card_id)->delete();
    }
}