<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'username' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);

        $credentials['password'] = bcrypt($credentials['password']);

        $newUser = User::create($credentials);

        Auth::login($newUser);
        
        return inertia('Home');
    }
}
