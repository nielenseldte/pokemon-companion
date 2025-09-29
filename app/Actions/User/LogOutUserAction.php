<?php

namespace App\Actions\User;

use App\Actions\Action;
use App\Actions\Contracts\ActionInterface;
use Illuminate\Support\Facades\Auth;

class LogOutUserAction extends Action implements ActionInterface
{
    public function perform(...$args)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();
    }

}