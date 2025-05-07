@extends('layouts.app')

@section('content')
<div class="flex h-screen">
    {{-- Sidebar --}}
    <aside class="w-64 bg-gray-800 text-white flex flex-col justify-between">
        <div>
            <div class="p-6 text-2xl font-bold border-b border-gray-700">Admin Panel</div>
            <nav class="mt-6 flex flex-col space-y-2 px-4">
                <a href="#" class="hover:bg-gray-700 p-2 rounded">🏟️ Wedstrijden</a>
                <a href="#" class="hover:bg-gray-700 p-2 rounded">👥 Teams</a>
                <a href="#" class="hover:bg-gray-700 p-2 rounded">🧍 Spelers</a>
            </nav>
        </div>
        <div class="p-4 border-t border-gray-700">
            <a href="#" class="block mb-2 text-sm hover:underline">👤 Profiel bekijken</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm hover:underline text-red-400">🚪 Uitloggen</button>
            </form>
        </div>
    </aside>

    {{-- Main content --}}
    <main class="flex-1 bg-gray-100 p-8 overflow-y-auto relative">
        {{-- Welkom notificatie --}}
        <div id="welcome-alert" class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow">
            Welkom admin!
        </div>

        <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

        {{-- Dummy tabel (later vervangen) --}}
        <div class="bg-white rounded shadow p-4 overflow-auto max-h-96">
            <table class="min-w-full text-left text-sm">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-xs leading-normal">
                        <th class="py-2 px-4">Wedstrijd</th>
                        <th class="py-2 px-4">Datum</th>
                        <th class="py-2 px-4">Status</th>
                        <th class="py-2 px-4">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">Team A vs Team B</td>
                        <td class="py-2 px-4">10-05-2025</td>
                        <td class="py-2 px-4">Gepland</td>
                        <td class="py-2 px-4 space-x-2">
                            <a href="#" class="text-blue-500 hover:underline">✏️</a>
                            <a href="#" class="text-red-500 hover:underline">🗑️</a>
                        </td>
                    </tr>
                    <!-- Meer rijen hier -->
                </tbody>
            </table>
        </div>
    </main>
</div>

{{-- Welkom popup fade-out script --}}
<script>
    setTimeout(() => {
        const alert = document.getElementById('welcome-alert');
        if (alert) alert.remove();
    }, 3000); // verdwijnt na 3 seconden
</script>
@endsection
