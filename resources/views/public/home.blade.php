@extends('layouts.public')

@section('content')
<div class="px-4 py-8 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Wedstrijden sectie -->
    <div class="lg:col-span-2">
        <h1 class="text-4xl font-bold mb-6">Wedstrijden</h1>

        <div x-data="{ tab: 'komend' }">
            <div class="flex space-x-2 mb-6">
                <button @click="tab = 'komend'"
                        :class="tab === 'komend' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800'"
                        class="px-5 py-2 rounded transition">
                    Komende Wedstrijden
                </button>
                <button @click="tab = 'verleden'"
                        :class="tab === 'verleden' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800'"
                        class="px-5 py-2 rounded transition">
                    Gespeeld
                </button>
            </div>

            <!-- Komend -->
            <div x-show="tab === 'komend'">
                @forelse($komend as $w)
                    <div class="bg-white rounded-xl shadow p-6 mb-4">
                        <h2 class="text-xl font-semibold mb-1">{{ $w->thuisTeam->naam }} vs {{ $w->uitTeam->naam }}</h2>
                        <p class="text-gray-600 text-sm mb-1">
                            📅 {{ \Carbon\Carbon::parse($w->datum)->format('d-m-Y H:i') }} 
                            | 📍 {{ $w->locatie ?? 'Onbekend' }}
                        </p>
                        <p class="text-sm">Status: <span class="font-semibold text-orange-600">{{ $w->status }}</span></p>
                    </div>
                @empty
                    <p class="text-gray-500">Geen geplande wedstrijden gevonden.</p>
                @endforelse
            </div>

            <!-- Verleden -->
            <div x-show="tab === 'verleden'">
                @forelse($voorbij as $w)
                    <div class="bg-white rounded-xl shadow p-6 mb-4">
                        <h2 class="text-xl font-semibold mb-1">{{ $w->thuisTeam->naam }} vs {{ $w->uitTeam->naam }}</h2>
                        <p class="text-gray-600 text-sm mb-1">
                            📅 {{ \Carbon\Carbon::parse($w->datum)->format('d-m-Y H:i') }} 
                            | 📍 {{ $w->locatie ?? 'Onbekend' }}
                        </p>
                        <p class="text-sm">Status: <span class="font-semibold text-green-600">{{ $w->status }}</span></p>
                    </div>
                @empty
                    <p class="text-gray-500">Geen gespeelde wedstrijden gevonden.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Teams & Spelers -->
    <div class="space-y-6">
        @include('components.public.teams-preview')
        @include('components.public.spelers-preview', ['spelers' => $spelers])
    </div>
</div>
@endsection
