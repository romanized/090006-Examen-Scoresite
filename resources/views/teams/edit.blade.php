@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Team bewerken</h1>

    <form method="POST" action="{{ route('teams.update', ['team' => $team->id]) }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="naam" class="block font-semibold">Teamnaam</label>
            <input type="text" id="naam" name="naam" value="{{ old('naam', $team->naam) }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Bijwerken
        </button>
    </form>
</div>
@endsection
