<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TeamController;
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

    Route::resource('teams', TeamController::class);

    Route::resource('allcards', CardController::class)->only(['index', 'show'])->parameters(['allcards' => 'card']);
    Route::get('/cards', [CardController::class, 'userCardsIndex']);
    Route::post('allcards/{card}/inventory', [CardController::class, 'addToInventory'])->name('allcards.addToInventory');
    Route::delete('allcards/{card}/inventory', [CardController::class, 'removeFromInventory'])->name('allcards.removeFromInventory');
    Route::post('allcards/{card}/wishlist', [CardController::class, 'addToWishlist'])->name('allcards.addToWishlist');
    Route::delete('allcards/{card}/wishlist', [CardController::class, 'removeFromWishlist'])->name('allcards.removeFromWishlist');
});

//Registration
Route::get('/register' ,[RegistrationController::class, 'create'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);

//Session handling
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('login', [SessionController::class, 'store'])->middleware('throttle:5,1');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

//Password Reset
Route::get('/forgot-password', [ForgotPasswordController::class, 'create']);
Route::post('/forgot-password', [ForgotPasswordController::class, 'store']);
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'store']);

