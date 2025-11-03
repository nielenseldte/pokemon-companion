<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use App\Actions\Card\AddCardToInventoryAction;
use App\Actions\Card\RemoveCardFromInventoryAction;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = Card::query()
            ->when(request()->input('search'), function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(8)
            ->withQueryString()
            ->through(fn($card) => [
            'id' => $card->id,
            'images' => $card->images
        ]);
        return inertia('Cards/Index', [
            'cards' => $cards,
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
        dd($card->id);
    }

    public function RemoveFromWishlist(Card $card)
    {
        dd($card->id);
    }
    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        $user = Auth::user();

        $userCards = $user->userCards->pluck('card_id')->toArray();
        
        $isOwned = in_array($card->id, $userCards);

        return inertia('Cards/Show', [
            'card' => $card,
            'isOwned' => $isOwned
        ]);
    }

}
