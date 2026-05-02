<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\EmailDoesNotExistYet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function create()
    {
        return inertia('Public/Auth/Register');
    }
    
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'email', new EmailDoesNotExistYet],
            'password' => ['required', 'confirmed'],
        ]);

        $newUser = User::create($credentials);

        Auth::login($newUser);
        
        return inertia('Home');
    }
}
