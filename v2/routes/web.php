<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth'])->group(function () {
    Route::get('meets/events', [App\Http\Controllers\MeetSystemController::class, 'events'])->name('meets.events');
    Route::resource('meets', App\Http\Controllers\MeetSystemController::class);
// });
