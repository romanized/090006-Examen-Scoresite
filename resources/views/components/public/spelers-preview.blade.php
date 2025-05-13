<div class="bg-white rounded-xl shadow p-6 mb-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Spelers</h2>
        <a href="{{ route('public.spelers.index') }}" class="text-blue-600 hover:underline text-sm">Bekijk alle spelers →</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-2 gap-6">
        @foreach($spelers as $speler)
            <a href="{{ route('public.spelers.show', $speler) }}"
               class="flex items-center gap-4 bg-gray-50 border border-gray-200 p-4 rounded-lg hover:shadow-md transition-all duration-200">
                <div class="w-14 h-14 flex items-center justify-center bg-blue-100 text-blue-700 font-bold text-xl rounded-full">
                    {{ strtoupper(substr($speler->naam, 0, 1)) }}
                </div>
                <div>
                    <div class="text-lg font-semibold text-gray-800">{{ $speler->naam }}</div>
                    <div class="text-sm text-gray-500">{{ $speler->positie ?? 'Onbekend' }}</div>
                </div>
            </a>
        @endforeach
    </div>
</div>
