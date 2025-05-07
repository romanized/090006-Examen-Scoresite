@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Nieuw team toevoegen</h1>

    <form method="POST" action="{{ route('teams.store') }}" class="bg-white p-6 rounded shadow max-w-xl">
        @csrf

        <div class="mb-4">
            <label for="naam" class="block font-semibold">Teamnaam</label>
            <input type="text" id="naam" name="naam" class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Opslaan
        </button>
    </form>
</div>
@endsection
