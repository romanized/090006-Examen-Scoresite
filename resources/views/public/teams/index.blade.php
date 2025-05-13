@extends('layouts.public')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6">Alle Teams</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($teams as $team)
            <a href="{{ route('public.teams.show', $team) }}" 
               class="block bg-white rounded shadow p-4 hover:shadow-lg transition">
                <h2 class="text-xl font-semibold">{{ $team->naam }}</h2>
                {{-- <p class="text-gray-500 text-sm">Stad: {{ $team->stad }}</p> --}}
            </a>
        @empty
            <p>Geen teams gevonden.</p>
        @endforelse
    </div>
</div>
@endsection
