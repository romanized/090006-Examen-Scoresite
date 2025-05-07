@extends('layouts.app')

@section('content')
<div class="p-8">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-2xl font-bold mb-4">Wedstrijden overzicht</h1>

    <a href="{{ route('wedstrijden.create') }}"
    class="bg-gray-900 hover:bg-gray-800 text-white px-4 py-2 rounded">
        ➕ Nieuwe wedstrijd
    </a>

    <div class="bg-white shadow rounded p-4 overflow-auto max-h-[600px]">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Datum</th>
                    <th class="px-4 py-2">Thuis</th>
                    <th class="px-4 py-2">Uit</th>
                    <th class="px-4 py-2">Score</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse($wedstrijden as $w)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $w->datum }}</td>
                        <td class="px-4 py-2">{{ $w->thuisTeam->naam ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $w->uitTeam->naam ?? '-' }}</td>
                        <td class="px-4 py-2">
                            {{ $w->thuis_score ?? '-' }} - {{ $w->uit_score ?? '-' }}
                        </td>
                        <td class="px-4 py-2">{{ $w->status }}</td>
                        <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('wedstrijden.edit', ['wedstrijd' => $w->id]) }}" class="text-blue-500 hover:underline">✏️</a>
                        <form action="{{ route('wedstrijden.destroy', ['wedstrijd' => $w->id]) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button
                        onclick="return confirm('Weet je zeker dat je deze wedstrijd wilt verwijderen?')"
                        type="submit"
                        class="text-red-500 hover:underline"
                        >
                        🗑️
                        </button>
                    </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500">Geen wedstrijden gevonden.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
