<?php

namespace App\Http\Controllers;

use App\Actions\Card\AddCardToInventoryAction;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;

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
    public function inventory(Card $card, AddCardToInventoryAction $addCardToInventory)
    {
        $addCardToInventory->perform($card->id);
    }

    public function wishlist(Card $card)
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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
