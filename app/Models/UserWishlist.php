<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserWishlist extends Model
{
    protected $table = 'user_wishlist';
    protected $fillable = ['user_id', 'card_id'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function card()
    {
        return Card::where('_id', $this->card_id)->first();
    }
}
