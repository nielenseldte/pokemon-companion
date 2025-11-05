<?php

namespace App\Actions\Card;

use App\Actions\Action;
use App\Actions\Contracts\ActionInterface;

class GetCardsAction extends Action implements ActionInterface
{
    public function perform(...$args)
    {
        $query = $args[0];

        return $query
                ->when(request()->input('search'), fn($query, $search) => 
                    $query->where('name', 'like', "%$search%")
                    )
                ->paginate(8)
                ->withQueryString()
                ->through(fn($card) => [
                    'id' => $card->id,
                    'images' => $card->images
                ]);
    }
}