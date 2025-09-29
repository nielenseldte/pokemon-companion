<?php

namespace App\Http\Controllers;

use App\Actions\User\LogInUserAction;
use App\Actions\User\LogOutUserAction;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    
    public function create()
    {
        return inertia('Public/Auth/Login');
    }

    
    public function store(Request $request, LogInUserAction $logInUser)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if ($logInUser->perform($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended();
        } 

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

   
    public function destroy(LogOutUserAction $logOutUser)
    {
        $logOutUser->perform();

        return inertia('Public/Welcome');
    }
}
