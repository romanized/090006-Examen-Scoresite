@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Spelers overzicht</h1>

    <a href="{{ route('spelers.create') }}" class="bg-gray-900 hover:bg-gray-800 text-white px-4 py-2 rounded">
        ➕ Nieuwe speler
    </a>

    <div class="bg-white shadow rounded p-4 overflow-auto mt-6 max-h-[600px]">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Naam</th>
                    <th class="px-4 py-2">Positie</th>
                    <th class="px-4 py-2">Rugnummer</th>
                    <th class="px-4 py-2">Team</th>
                    <th class="px-4 py-2">Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse($spelers as $speler)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $speler->naam }}</td>
                        <td class="px-4 py-2">{{ $speler->positie ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $speler->rugnummer ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $speler->team->naam }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('spelers.edit', ['speler' => $speler->id]) }}" class="text-blue-500 hover:underline">✏️</a>
                            <form action="{{ route('spelers.destroy', ['speler' => $speler->id]) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Speler verwijderen?')" class="text-red-500 hover:underline">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">Nog geen spelers.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
