@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Speler bewerken</h1>

    <form method="POST" action="{{ route('spelers.update', ['speler' => $speler->id]) }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Naam</label>
            <input type="text" name="naam" value="{{ old('naam', $speler->naam) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Positie</label>
            <input type="text" name="positie" value="{{ old('positie', $speler->positie) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Rugnummer</label>
            <input type="number" name="rugnummer" value="{{ old('rugnummer', $speler->rugnummer) }}" class="w-full border rounded px-3 py-2" min="1">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Team</label>
            <select name="team_id" class="w-full border rounded px-3 py-2" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" @selected($speler->team_id == $team->id)>{{ $team->naam }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Bijwerken
        </button>
    </form>
</div>
@endsection
