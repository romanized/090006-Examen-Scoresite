@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Nieuwe wedstrijd toevoegen</h1>

    <form method="POST" action="{{ route('wedstrijden.store') }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Thuisteam</label>
            <select name="thuis_team_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Kies thuisteam --</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->naam }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Uitteam</label>
            <select name="uit_team_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Kies uitteam --</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->naam }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Datum & Tijd</label>
            <input type="datetime-local" name="datum" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Locatie</label>
            <input type="text" name="locatie" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="Gepland">Gepland</option>
                <option value="Bezig">Bezig</option>
                <option value="Gespeeld">Gespeeld</option>
            </select>
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Thuis Score</label>
                <input type="number" name="thuis_score" min="0" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block font-semibold">Uit Score</label>
                <input type="number" name="uit_score" min="0" class="w-full border rounded px-3 py-2">
            </div>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Opslaan
        </button>
    </form>
</div>
@endsection
