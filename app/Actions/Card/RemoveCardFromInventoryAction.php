<?php

namespace App\Actions\Card;

use App\Actions\Action;
use App\Models\UserCard;
use Illuminate\Support\Facades\Auth;
use App\Actions\Contracts\ActionInterface;

class RemoveCardFromInventoryAction extends Action implements ActionInterface
{
    public function perform(...$args)
    {
        $card_id = $args[0];
        $user_id = Auth::id();

        UserCard::where('card_id', '=', $card_id)->where('user_id', '=', $user_id)->delete();
    }
}