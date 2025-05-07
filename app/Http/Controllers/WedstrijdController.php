<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use Illuminate\Http\Request;

class WedstrijdController extends Controller
{
    public function index()
    {
        $wedstrijden = Wedstrijd::orderBy('datum', 'desc')->get();

        return view('wedstrijden.index', compact('wedstrijden'));
    }

    public function create()
    {
        $teams = \App\Models\Team::orderBy('naam')->get();
        return view('wedstrijden.create', compact('teams'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'thuis_team_id' => 'required|exists:teams,id',
            'uit_team_id' => 'required|exists:teams,id|different:thuis_team_id',
            'datum' => 'required|date',
            'locatie' => 'nullable|string|max:255',
            'status' => 'required|string|in:Gepland,Bezig,Gespeeld',
            'thuis_score' => 'nullable|integer|min:0',
            'uit_score' => 'nullable|integer|min:0',
        ]);
    
        \App\Models\Wedstrijd::create($validated);
    
        return redirect()->route('wedstrijden.index')->with('success', 'Wedstrijd toegevoegd!');
    }

    public function edit(Wedstrijd $wedstrijd)
    {
        $teams = \App\Models\Team::orderBy('naam')->get();
        return view('wedstrijden.edit', compact('wedstrijd', 'teams'));
    }
    
    public function update(Request $request, Wedstrijd $wedstrijd)
    {
        $validated = $request->validate([
            'thuis_team_id' => 'required|exists:teams,id',
            'uit_team_id' => 'required|exists:teams,id|different:thuis_team_id',
            'datum' => 'required|date',
            'locatie' => 'nullable|string|max:255',
            'status' => 'required|string|in:Gepland,Bezig,Gespeeld',
            'thuis_score' => 'nullable|integer|min:0',
            'uit_score' => 'nullable|integer|min:0',
        ]);
    
        $wedstrijd->update($validated);
    
        return redirect()->route('wedstrijden.index')->with('success', 'Wedstrijd bijgewerkt!');
    }    

    public function destroy(Wedstrijd $wedstrijd)
    {
        $wedstrijd->delete();

        return redirect()->route('wedstrijden.index')->with('success', 'Wedstrijd verwijderd.');
    }
}
