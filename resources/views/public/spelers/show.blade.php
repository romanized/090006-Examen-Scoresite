@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $speler->naam }}</h1>

    <p class="text-gray-700"><strong>Positie:</strong> {{ $speler->positie ?? 'Onbekend' }}</p>
    <p class="text-gray-700"><strong>Team:</strong> 
        @if($speler->team)
        <a href="{{ route('public.teams.show', $speler->team) }}" class="text-blue-600 hover:underline">
                {{ $speler->team->naam }}
            </a>
        @else
            Geen team
        @endif
    </p>

    {{-- Eventueel later: stats, foto, bio, enz. --}}
</div>
@endsection
