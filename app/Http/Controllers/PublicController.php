<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use Illuminate\Http\Request;
use App\Models\Team;

class PublicController extends Controller
{
    public function home()
    {
        $komend = Wedstrijd::with(['thuisTeam', 'uitTeam'])
            ->where('datum', '>=', now())
            ->orderBy('datum')
            ->take(5)
            ->get();

        return view('public.home', compact('komend'));
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
}
