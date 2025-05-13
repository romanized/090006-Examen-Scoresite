@extends('layouts.public')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Alle Spelers</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($spelers as $speler)
            <a href="{{ route('public.spelers.show', $speler) }}" 
               class="block bg-white rounded shadow p-4 hover:shadow-lg transition">
                <h2 class="text-xl font-semibold">{{ $speler->naam }}</h2>
                <p class="text-gray-500 text-sm">{{ $speler->positie ?? 'Onbekend' }}</p>
                <p class="text-gray-400 text-xs mt-1">
                    Team: {{ $speler->team->naam ?? 'Zonder team' }}
                </p>
            </a>
        @empty
            <p>Geen spelers gevonden.</p>
        @endforelse
    </div>
</div>
@endsection
