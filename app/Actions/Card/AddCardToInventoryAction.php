<?php

namespace App\Actions\Card;

use App\Actions\Action;
use App\Actions\Contracts\ActionInterface;
use Illuminate\Support\Facades\Log;
use App\Models\UserCard;
use Illuminate\Support\Facades\Auth;

class AddCardToInventoryAction extends Action implements ActionInterface
{
    protected ?UserCard $link = null;
    protected $user_id = null;
    protected $card_id = null;

    public function perform(...$args)
    {
        $this->card_id = $args[0];
        $this->user_id = Auth::id();
        

        $this->link = UserCard::create([
            'user_id' => $this->user_id,
            'card_id' => (string) $this->card_id
        ]);

        $this->logResults();

    }

    public function logResults()
    {
        if ($this->link) {
            Log::info('Card Linked to User', [
                'user_id' => $this->user_id,
                'card_id' => $this->card_id
            ]);
        } else {
            Log::warning('AddCardToInventoryAction was performed but no link was created', [
                'failed_at' => now()->toDateTimeString()
            ]);
        }
    }
}