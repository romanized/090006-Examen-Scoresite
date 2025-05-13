<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Carbon;

class PublicController extends Controller
{
    public function home()
    {
        $komend = Wedstrijd::with(['thuisTeam', 'uitTeam'])
            ->where('datum', '>=', now())
            ->orderBy('datum')
            ->get();

        $voorbij = Wedstrijd::with(['thuisTeam', 'uitTeam'])
            ->where('datum', '<', now())
            ->orderByDesc('datum')
            ->take(5) // optioneel: alleen laatste 5
            ->get();

        $teams = Team::orderBy('naam')->take(4)->get();
        $spelers = \App\Models\Speler::with('team')->inRandomOrder()->take(4)->get();

        return view('public.home', compact('komend', 'voorbij', 'teams', 'spelers'));
    }

    public function teams()
    {
        $teams = Team::orderBy('naam')->get();
        return view('public.teams.index', compact('teams'));
    }

    public function showTeam(\App\Models\Team $team)
    {
        $team->load(['spelers', 'thuiswedstrijden', 'uitwedstrijden']);

        $wedstrijden = collect()
            ->merge($team->thuiswedstrijden)
            ->merge($team->uitwedstrijden)
            ->sortByDesc('datum');

        return view('public.teams.show', compact('team', 'wedstrijden'));
    }

    public function showWedstrijd(Wedstrijd $wedstrijd)
    {
        return view('public.wedstrijden.show', compact('wedstrijd'));
    }

    public function showSpeler(\App\Models\Speler $speler)
    {
        $speler->load('team');
        return view('public.spelers.show', compact('speler'));
    }

    public function spelers()
    {
        $spelers = \App\Models\Speler::with('team')->orderBy('naam')->get();
        return view('public.spelers.index', compact('spelers'));
    }
    
    
}
