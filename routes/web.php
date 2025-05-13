<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WedstrijdController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\SpelerController;
use App\Http\Controllers\PublicController;

// Publieke routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/teams', [PublicController::class, 'teams'])->name('public.teams');
Route::get('/spelers', [PublicController::class, 'spelers'])->name('public.spelers.index');
Route::get('/teams-publiek', [PublicController::class, 'teams'])->name('public.teams');
Route::get('/alle-spelers', [PublicController::class, 'spelers'])->name('public.spelers.index');




// Admin-only routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->middleware('verified')->name('dashboard');

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
Route::get('/spelers/{speler}', [PublicController::class, 'showSpeler'])->name('public.spelers.show');

require __DIR__.'/auth.php';
