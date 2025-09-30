<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Public/Welcome');
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

//Registration
Route::get('/register' ,[RegistrationController::class, 'create'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/login', function() {
    return inertia('Public/Auth/Login');
});

