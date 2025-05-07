<?php

namespace App\Http\Controllers;

use App\Models\Speler;
use App\Models\Team;
use Illuminate\Http\Request;

class SpelerController extends Controller
{
    public function index()
    {
        $spelers = Speler::with('team')->orderBy('naam')->get();
        return view('spelers.index', compact('spelers'));
    }

    public function create()
    {
        $teams = Team::orderBy('naam')->get();
        return view('spelers.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'positie' => 'nullable|string|max:255',
            'rugnummer' => 'nullable|integer|min:1',
            'team_id' => 'required|exists:teams,id',
        ]);

        Speler::create($validated);

        return redirect()->route('spelers.index')->with('success', 'Speler toegevoegd!');
    }

    public function edit(Speler $speler)
    {
        $teams = Team::orderBy('naam')->get();
        return view('spelers.edit', compact('speler', 'teams'));
    }

    public function update(Request $request, Speler $speler)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'positie' => 'nullable|string|max:255',
            'rugnummer' => 'nullable|integer|min:1',
            'team_id' => 'required|exists:teams,id',
        ]);

        $speler->update($validated);

        return redirect()->route('spelers.index')->with('success', 'Speler bijgewerkt!');
    }

    public function destroy(Speler $speler)
    {
        $speler->delete();

        return redirect()->route('spelers.index')->with('success', 'Speler verwijderd!');
    }
}
