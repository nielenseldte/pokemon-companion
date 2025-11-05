<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use App\Actions\Card\AddCardToInventoryAction;
use App\Actions\Card\GetCardsAction;
use App\Actions\Card\RemoveCardFromInventoryAction;

class CardController extends Controller
{
    /**
     * Display a listing of all cards in the database.
     */
    public function index(GetCardsAction $getCards)
    {
        $cards = $getCards->perform(Card::query());
        return inertia('Cards/Index', [
            'cards' => $cards,
            'filters' => request()->only(['search'])
        ]);
    }

    /**
    *Display a user's cards to them
    */
    public function userCardsIndex(GetCardsAction $getCards)
    {
            $user = Auth::user();
            $userCards = $getCards->perform($user->cards());
        return inertia('UserCards/Index', [
            'cards' => $userCards,
            'filters' => request()->only(['search'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function AddToInventory(Card $card, AddCardToInventoryAction $addCardToInventory)
    {
        $addCardToInventory->perform($card->id);
    }

    public function RemoveFromInventory(Card $card, RemoveCardFromInventoryAction $removeCardFromInventory)
    {
        $removeCardFromInventory->perform($card->id);
    }

    public function AddToWishlist(Card $card)
    {
        //TODO
        dd($card->id);
    }

    public function RemoveFromWishlist(Card $card)
    {
        //TODO
        dd($card->id);
    }
    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        $user = Auth::user();
        
        $isOwned = $user->userCards()->where('card_id', $card->id)->exists();

        return inertia('Cards/Show', [
            'card' => $card,
            'isOwned' => $isOwned
        ]);
    }

}
