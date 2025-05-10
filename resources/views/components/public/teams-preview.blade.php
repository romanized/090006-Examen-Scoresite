<div class="bg-white rounded shadow p-4 mb-6">
    <h2 class="text-xl font-bold mb-3">Teams</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        @foreach($teams as $team)
            <a href="{{ route('public.teams.show', $team) }}" class="border p-3 rounded hover:shadow">
                @if($team->logo_url)
                    <img src="{{ $team->logo_url }}" alt="Logo {{ $team->naam }}" class="h-12 mx-auto mb-2 object-contain">
                @endif
                <div class="text-center font-semibold">{{ $team->naam }}</div>
            </a>
        @endforeach
    </div>

    <div class="mt-4 text-right">
        <a href="{{ route('teams.index') }}" class="text-blue-600 hover:underline text-sm">Bekijk alle teams →</a>
    </div>
</div>
