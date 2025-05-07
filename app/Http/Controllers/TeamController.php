<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('naam')->get();
        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'stad' => 'nullable|string|max:255',
            'logo_url' => 'nullable|url',
        ]);

        Team::create($validated);

        return redirect()->route('teams.index')->with('success', 'Team toegevoegd!');
    }

    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'naam' => 'required|string|max:255',
            'stad' => 'nullable|string|max:255',
            'logo_url' => 'nullable|url',
        ]);

        $team->update($validated);

        return redirect()->route('teams.index')->with('success', 'Team bijgewerkt!');
    }

    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team verwijderd!');
    }
}
