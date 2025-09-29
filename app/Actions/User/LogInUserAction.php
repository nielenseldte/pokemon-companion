<?php

namespace App\Actions\User;

use App\Actions\Action;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Actions\Contracts\ActionInterface;

class LogInUserAction extends Action implements ActionInterface
{
    protected ?string $email = null;
    protected bool $success = false;

    public function perform(...$args)
    {
        $credentials = $args[0];

        $this->email = $credentials['email'];
        $this->success = Auth::attempt($credentials);
        $this->logResults();

        return $this->success;

    }

    public function logResults()
    {
        Log::info('Login attempt', [
            'email' => $this->email,
            'success' => $this->success,
            'attempted_at' => now()->toDateTimeString(),
        ]);
    }
}