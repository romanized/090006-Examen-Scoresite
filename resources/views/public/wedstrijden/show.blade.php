@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">
        Wedstrijd: {{ $wedstrijd->thuisTeam->naam }} vs {{ $wedstrijd->uitTeam->naam }}
    </h1>

    <ul class="text-gray-700 space-y-2">
        <li><strong>📅 Datum:</strong> {{ $wedstrijd->datum }}</li>
        <li><strong>🎯 Status:</strong> {{ $wedstrijd->status }}</li>
        <li><strong>📍 Locatie:</strong> {{ $wedstrijd->locatie ?? 'Onbekend' }}</li>
        <li>
            <strong>🏆 Score:</strong> 
            {{ $wedstrijd->thuisTeam->naam }} 
            <strong>{{ $wedstrijd->thuis_score ?? '-' }}</strong> - 
            <strong>{{ $wedstrijd->uit_score ?? '-' }}</strong> 
            {{ $wedstrijd->uitTeam->naam }}
        </li>
    </ul>

    <div class="mt-6 text-blue-600 underline space-x-4">
        <a href="{{ route('public.teams.show', $wedstrijd->thuisTeam->id) }}">← {{ $wedstrijd->thuisTeam->naam }}</a>
        <a href="{{ route('public.teams.show', $wedstrijd->uitTeam->id) }}">← {{ $wedstrijd->uitTeam->naam }}</a>
    </div>
</div>
@endsection
