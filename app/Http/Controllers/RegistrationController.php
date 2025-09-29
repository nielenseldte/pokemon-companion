<?php

namespace App\Http\Controllers;

use App\Actions\User\RegisterUserAction;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return inertia('Public/Auth/Register');
    }
    
    public function store(Request $request, RegisterUserAction $registerUser)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = $registerUser->perform($credentials);
        $registerUser->logResults();

        return inertia('Home');

    }


}
