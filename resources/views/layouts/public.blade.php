<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>090006 Examen - Scoresite</title>
    <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-a5LbsFvDgWszr2jcQ-YXUTD4dp42_xSH4w&s" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-b from-sky-100 to-white text-gray-800 min-h-screen antialiased">
    <header class="py-6 px-8 bg-white shadow mb-8">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-700">⚽ Scoresite</h1>
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Admin login</a>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4">
        @yield('content')
    </main>

    <footer class="mt-16 py-8 bg-white border-t text-center text-sm text-gray-500">
        Nebi Canlioglu 090006 - Grafisch Lyceum Rotterdam Eindexamen
    </footer>
</body>
</html>
