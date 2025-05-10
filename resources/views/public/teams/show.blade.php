@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $team->naam }}</h1>
    <p class="text-gray-600 mb-6">Stad: {{ $team->stad }}</p>

    <h2 class="text-xl font-semibold mt-8 mb-2">Spelers</h2>
    <ul class="list-disc ml-6">
        @forelse($team->spelers as $speler)
        <li>
            <a href="{{ route('public.spelers.show', $speler->id) }}" class="text-blue-600 hover:underline">
                {{ $speler->naam }}
            </a> ({{ $speler->positie ?? 'onbekend' }})
        </li>
        @empty
            <li>Geen spelers gevonden.</li>
        @endforelse
    </ul>

    <h2 class="text-xl font-semibold mt-8 mb-2">Wedstrijden</h2>
    <ul class="list-disc ml-6">
        @forelse($wedstrijden as $wedstrijd)
            <li>
                {{ $wedstrijd->datum }}: 
                {{ $wedstrijd->thuisTeam->naam }} vs {{ $wedstrijd->uitTeam->naam }} 
                ({{ $wedstrijd->status }})
            </li>
        @empty
            <li>Geen wedstrijden gevonden.</li>
        @endforelse
    </ul>
</div>
@endsection
