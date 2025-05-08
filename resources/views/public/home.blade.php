@extends('layouts.app')

@section('content')
<div class="p-8 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Komende Wedstrijden</h1>

    @forelse($komend as $w)
        <div class="bg-white p-4 rounded shadow mb-4">
            <div class="text-lg font-semibold">
                {{ $w->thuisTeam->naam }} vs {{ $w->uitTeam->naam }}
            </div>
            <div class="text-sm text-gray-600">
                📅 {{ \Carbon\Carbon::parse($w->datum)->format('d-m-Y H:i') }} | 📍 {{ $w->locatie ?? 'Onbekend' }}
            </div>
            <div class="mt-1 text-sm">
                Status: <span class="font-medium">{{ $w->status }}</span>
            </div>
        </div>
    @empty
        <p class="text-gray-500">Geen geplande wedstrijden gevonden.</p>
    @endforelse
</div>
@endsection
