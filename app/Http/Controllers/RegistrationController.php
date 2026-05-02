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
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'email', function($attribute, $value, $fail) {
                $hash = hash('sha256', strtolower($value));
                if (User::where('email_index_hash', $hash)->exists()) {
                    $fail("An account with this $attribute already exists");
                }
            }],
            'password' => ['required', 'confirmed'],
        ]);

        $newUser = User::create($credentials);

        Auth::login($newUser);
        
        return inertia('Home');
    }
}
