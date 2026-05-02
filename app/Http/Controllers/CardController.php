<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\UserCard;
use App\Services\UserInventoryService;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of all cards in the database.
     */
    public function index(Request $request)
    {
        $cards = Card::
            when(
                $request->input('search'),
                fn($query, $search) =>
                $query->where('name', 'like', "%$search%")
            )
            ->paginate(8)
            ->withQueryString()
            ->through(fn($card) => [
                'id' => $card->id,
                'images' => $card->images
            ]);
        $ownedCardIds = $request->user()->ownedCardIds();
        return inertia('Cards/Index', [
            'cards' => $cards,
            'filters' => $request->only(['search']),
            'ownedCardIds' => $ownedCardIds
        ]);
    }

    /**
     *Display a user's cards to them
     */
    public function userCardsIndex(Request $request, UserInventoryService $service)
    {
        $userCards = $service->getCards($request->user())->when(
            $request->input('search'),
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
            'filters' => $request->only(['search'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function AddToInventory(Request $request, Card $card)
    {
        $user = $request->user();
        $userId = $user->id;
        $cardId = $card->id;

        if ($user->ownsCard($card)) {
            abort(409, 'Card already exists in inventory');
        }

        //create a link between the user and the card.
        UserCard::create([
            'user_id' => $userId,
            'card_id' => (string)$cardId
        ]);
    }

    public function RemoveFromInventory(Request $request, Card $card)
    {
        $userId = $request->user()->id;
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
    public function show(Request $request, Card $card)
    {
        $user = $request->user();

        $isOwned = $user->ownsCard($card);

        return inertia('Cards/Show', [
            'card' => $card,
            'isOwned' => $isOwned
        ]);
    }
}
