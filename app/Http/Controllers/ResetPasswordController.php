<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    public function create(Request $request ,$token)
    {
        $request->validate([
            'email' => ['required', 'email', 'string']
        ]);

        return inertia('Public/Auth/ResetPassword', [
            'token' => $token,
            'email' => $request->email
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([

            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function($user) use ($request) {
            $user->forceFill([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60)
            ])->save();

            //event(new PasswordReset($user)); Later if I start sending a confirmation email
        });

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', __($status));
        }

        throw ValidationException::withMessages([
            'email' => [__($status)]
        ]);
    }
}
