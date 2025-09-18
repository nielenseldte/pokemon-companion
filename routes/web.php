<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Welcome');
});

Route::get('/home', function() {
    //sleep(2);
    return inertia('Home');
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
