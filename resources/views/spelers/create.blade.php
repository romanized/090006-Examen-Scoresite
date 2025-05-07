@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Nieuwe speler toevoegen</h1>

    <form method="POST" action="{{ route('spelers.store') }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">Naam</label>
            <input type="text" name="naam" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Positie</label>
            <input type="text" name="positie" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Rugnummer</label>
            <input type="number" name="rugnummer" class="w-full border rounded px-3 py-2" min="1">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Team</label>
            <select name="team_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Kies een team --</option>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->naam }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Opslaan
        </button>
    </form>
</div>
@endsection
