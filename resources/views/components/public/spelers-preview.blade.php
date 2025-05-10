<div class="bg-white rounded shadow p-4 mb-6">
    <h2 class="text-xl font-bold mb-3">Spelers</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @foreach($spelers as $speler)
            <a href="{{ route('public.spelers.show', $speler) }}" class="border p-3 rounded hover:shadow">
                <div class="text-center font-semibold">{{ $speler->naam }}</div>
                <div class="text-center text-sm text-gray-600">
                    {{ $speler->positie ?? 'Onbekend' }}
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-4 text-right">
        {{-- AANPASSING: route naar een publieke overzichtspagina --}}
        <a href="#" class="text-blue-600 hover:underline text-sm">Bekijk alle spelers →</a>
    </div>
</div>
