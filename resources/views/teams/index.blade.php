@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Teams overzicht</h1>

    <a href="{{ route('teams.create') }}" class="bg-gray-900 hover:bg-gray-800 text-white px-4 py-2 rounded">
        ➕ Nieuw team
    </a>

    <div class="bg-white shadow rounded p-4 overflow-auto mt-6 max-h-[600px]">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Teamnaam</th>
                    <th class="px-4 py-2">Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teams as $team)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $team->naam }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('teams.edit', ['team' => $team->id]) }}" class="text-blue-500 hover:underline">✏️</a>
                            <form action="{{ route('teams.destroy', ['team' => $team->id]) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-4 py-2 text-center text-gray-500">Nog geen teams toegevoegd.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
