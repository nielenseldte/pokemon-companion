<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Support\Facades\Auth;

class UserCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userCardIds = $user->userCards->pluck('card_id')->toArray();
        $userCards = Card::whereIn('_id', $userCardIds)->get();
        return inertia('UserCards/Index', [
            'cards' => $userCards
        ]);
    }

}
