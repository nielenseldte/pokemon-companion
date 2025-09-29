<?php

namespace App\Actions\User;

use App\Models\User;
use App\Actions\Action;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Actions\Contracts\ActionInterface;

class RegisterUserAction extends Action implements ActionInterface
{
    protected ?User $user = null;

    public function perform(...$args)
    {
        $credentials = $args[0];

        $credentials['password'] = bcrypt($credentials['password']);

        $this->user = User::create($credentials);

        Auth::login($this->user);

        return $this->user;
    }

    public function logResults()
    {
        if ($this->user) {
            Log::info('User Registered', [
                'user_id' => $this->user->id,
                'email' => $this->user->email,
                'registered_at' => now()->toDateTimeString()
            ]);
        } else {
            Log::warning('RegisterUserAction was performed but no user was created', [
                'failed_at' => now()->toDateTimeString()
            ]);
        }
    }
}