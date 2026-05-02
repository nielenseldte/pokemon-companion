<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'email' => 'encrypted'
        ];
    }

    protected static function booted() {
        static::saving(function($user) {
            if ($user->isDirty('email')) {
                $user->email_index_hash = hash('sha256', strtolower($user->email));
            }
        });
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    public function userCards(): HasMany
    {
        return $this->hasMany(UserCard::class);
    }

    public function userWishlist(): HasMany
    {
        return $this->hasMany(UserWishlist::class);
    }

    //Helpers

    public function ownsCard(Card $card) : bool {
        return $this->userCards()->where('card_id', $card->id)->exists();
    }

    public function hasCardInWishlist(Card $card) : bool {
        return $this->userWishlist()->where('card_id', $card->id)->exists();
    }

    public function ownedCardIds() : array {
        return $this->userCards()->pluck('card_id')->all();
    }
}
