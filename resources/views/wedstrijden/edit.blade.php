@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Wedstrijd bewerken</h1>

    <form method="POST" action="{{ route('wedstrijden.update', ['wedstrijd' => $wedstrijd->id]) }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold">Thuisteam</label>
            <select name="thuis_team_id" class="w-full border rounded px-3 py-2" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" @selected($wedstrijd->thuis_team_id == $team->id)>
                        {{ $team->naam }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Uitteam</label>
            <select name="uit_team_id" class="w-full border rounded px-3 py-2" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}" @selected($wedstrijd->uit_team_id == $team->id)>
                        {{ $team->naam }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Datum & Tijd</label>
            <input type="datetime-local" name="datum" value="{{ old('datum', \Carbon\Carbon::parse($wedstrijd->datum)->format('Y-m-d\TH:i')) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Locatie</label>
            <input type="text" name="locatie" value="{{ old('locatie', $wedstrijd->locatie) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                @foreach(['Gepland', 'Bezig', 'Gespeeld'] as $status)
                    <option value="{{ $status }}" @selected($wedstrijd->status === $status)>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Thuis Score</label>
                <input type="number" name="thuis_score" value="{{ old('thuis_score', $wedstrijd->thuis_score) }}" min="0" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold">Uit Score</label>
                <input type="number" name="uit_score" value="{{ old('uit_score', $wedstrijd->uit_score) }}" min="0" class="w-full border rounded px-3 py-2">
            </div>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Bijwerken
        </button>
    </form>
</div>
@endsection
