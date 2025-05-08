<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WedstrijdController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SpelerController;
use App\Http\Controllers\PublicController;

// 🔓 Publieke routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/teams', [PublicController::class, 'teams'])->name('public.teams');

// 🔐 Ingelogde admin-only routes
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

    Route::resource('teams', TeamController::class)
        ->parameters(['teams' => 'team'])
        ->except(['show']);

    Route::resource('spelers', SpelerController::class)
        ->parameters(['spelers' => 'speler'])
        ->except(['show']);
});

Route::get('/teams/{team}', [PublicController::class, 'showTeam'])->name('public.teams.show');
Route::get('/wedstrijden/{wedstrijd}', [PublicController::class, 'showWedstrijd'])->name('public.wedstrijden.show');

require __DIR__.'/auth.php';
