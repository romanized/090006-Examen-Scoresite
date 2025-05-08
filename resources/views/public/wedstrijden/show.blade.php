@extends('layouts.app')

@section('content')
    <div class="p-8">
        <h1 class="text-2xl font-bold mb-4">Wedstrijd: {{ $wedstrijd->thuisTeam->naam }} vs {{ $wedstrijd->uitTeam->naam }}</h1>

        <p><strong>Datum:</strong> {{ $wedstrijd->datum }}</p>
        <p><strong>Status:</strong> {{ $wedstrijd->status }}</p>
        <p><strong>Score:</strong> {{ $wedstrijd->thuis_score ?? '-' }} - {{ $wedstrijd->uit_score ?? '-' }}</p>
        <p><strong>Locatie:</strong> {{ $wedstrijd->locatie ?? '-' }}</p>
    </div>
@endsection
