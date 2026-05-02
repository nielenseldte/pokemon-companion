<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use App\Models\UserCard;

class CardController extends Controller
{
    /**
     * Display a listing of all cards in the database.
     */
    public function index()
    {
        $user = Auth::user();
        $cards = Card::when(
            request()->input('search'),
            fn($query, $search) =>
            $query->where('name', 'like', "%$search%")
        )
            ->paginate(8)
            ->withQueryString()
            ->through(fn($card) => [
                'id' => $card->id,
                'images' => $card->images
            ]);
        $ownedCardIds = $user->userCards->pluck('card_id')->toArray();
        return inertia('Cards/Index', [
            'cards' => $cards,
            'filters' => request()->only(['search']),
            'ownedCardIds' => $ownedCardIds
        ]);
    }

    /**
    *Display a user's cards to them
    */
    public function userCardsIndex()
    {
        $user = Auth::user();
        $userCards = $user->cards()->when(
            request()->input('search'),
            fn($query, $search) =>
            $query->where('name', 'like', "%$search%")
        )
            ->paginate(8)
            ->withQueryString()
            ->through(fn($card) => [
                'id' => $card->id,
                'images' => $card->images
            ]);
        return inertia('UserCards/Index', [
            'cards' => $userCards,
            'filters' => request()->only(['search'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function AddToInventory(Card $card)
    {
        $userId = Auth::id();
        $cardId = $card->id;

        //create a link between the user and the card.
        UserCard::create([
            'user_id' => $userId,
            'card_id' => (string )$cardId
        ]);
    }

    public function RemoveFromInventory(Card $card)
    {
        $userId = Auth::id();
        $cardId = $card->id;

        UserCard::where('card_id', $cardId)->where('user_id', $userId)->delete();
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
