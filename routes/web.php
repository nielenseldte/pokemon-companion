<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return inertia('Welcome');
});

Route::get('/home', function() {
    //sleep(2);
    return inertia('Home', [
        'time' => now()->toTimeString()
    ]);
});

Route::get('/my-cards', function() {
    return inertia('MyCards');
});

Route::get('/my-teams', function() {
    return inertia('MyTeams');
});

Route::get('/all-cards', function() {
    return inertia('AllCards');
});

Route::get('/register' ,function() {
    return inertia('Auth/Register');
});

Route::get('/login', function() {
    return inertia('Auth/Login');
});

Route::post('/login', LoginController::class)->middleware('throttle:5,1')->name('login.attempt');

// Route::post('/logout'. LogOutController::class)->name('logout');