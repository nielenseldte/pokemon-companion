<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserCardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Public/Welcome');
});
Route::get('/teams/test', function () {
    return inertia('Teams/Show');
});

Route::middleware('auth')->group( function() {
    Route::get('/home', function () {
        return inertia('Home');
    })->name('home');

    Route::resource('cards', UserCardController::class);

    Route::resource('teams', TeamController::class);

    Route::resource('allcards', CardController::class)->parameters(['allcards' => 'card']);
});




//Registration
Route::get('/register' ,[RegistrationController::class, 'create'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);

//Session handling
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

