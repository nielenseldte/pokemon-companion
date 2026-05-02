<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function create()
    {
        return inertia('Public/Auth/ForgotPassword');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $hash = hash('sha256', strtolower($request['email']));
        $user = User::where('email_index_hash', $hash)->first();

        if ($user) {
            Password::sendResetLink($request->only('email'));
        }
        //for security reasons
        return back()->with(['success' => 'Reset link sent if as user with that email exists.']);
    }
}
