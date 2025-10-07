<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Models\Card;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Public/Welcome');
});

Route::get('/home', function() {
    //sleep(2);
    return inertia('Home', [
        'time' => now()->toTimeString()
    ]);
})->name('home');

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

//Session handling
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

