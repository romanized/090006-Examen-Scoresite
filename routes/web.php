<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WedstrijdController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('wedstrijden', WedstrijdController::class)
    ->parameters(['wedstrijden' => 'wedstrijd'])
    ->except(['show']);

    Route::resource('teams', \App\Http\Controllers\TeamController::class)
    ->parameters(['teams' => 'team'])
    ->except(['show']);

    Route::resource('spelers', \App\Http\Controllers\SpelerController::class)
    ->parameters(['spelers' => 'speler'])
    ->except(['show']);

});

require __DIR__.'/auth.php';
