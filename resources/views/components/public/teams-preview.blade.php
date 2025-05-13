<div class="bg-white rounded-xl shadow p-6 mb-6">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Teams</h2>
        <a href="{{ route('public.teams') }}" class="text-blue-600 hover:underline text-sm font-medium">Bekijk alle teams →</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-2 gap-6">
        @foreach($teams as $team)
            <a href="{{ route('public.teams.show', $team) }}"
               class="flex items-center gap-4 bg-gray-50 border border-gray-200 p-4 rounded-lg hover:shadow-md transition-all duration-200">
                @if($team->logo_url)
                    <img src="{{ $team->logo_url }}" alt="Logo {{ $team->naam }}"
                         class="w-14 h-14 object-contain rounded bg-white p-1 border border-gray-200">
                @else
                    <div class="w-14 h-14 flex items-center justify-center bg-gray-200 rounded text-gray-500 text-xl font-bold">
                        {{ strtoupper(substr($team->naam, 0, 1)) }}
                    </div>
                @endif

                <div>
                    <div class="text-lg font-semibold text-gray-800">{{ $team->naam }}</div>
                    @if($team->stad)
                        <div class="text-sm text-gray-500">{{ $team->stad }}</div>
                    @endif
                </div>
            </a>
        @endforeach
    </div>
</div>
