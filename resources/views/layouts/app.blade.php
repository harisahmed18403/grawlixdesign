<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Grawlix Design')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-zinc-100 min-h-screen flex flex-col">

    <header class="border-b border-zinc-800">
        <nav class="max-w-5xl mx-auto px-6 py-5 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold tracking-tight text-white hover:text-violet-400 transition-colors">
                Grawlix<span class="text-violet-400">.</span>
            </a>
            <ul class="flex gap-8 text-sm font-medium text-zinc-400">
                <li><a href="{{ route('home') }}" class="hover:text-white transition-colors {{ request()->routeIs('home') ? 'text-white' : '' }}">Home</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors {{ request()->routeIs('contact') ? 'text-white' : '' }}">Contact</a></li>
                <li><a href="{{ route('fun') }}" class="hover:text-white transition-colors {{ request()->routeIs('fun') ? 'text-white' : '' }}">Fun</a></li>
            </ul>
        </nav>
    </header>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="border-t border-zinc-800 py-8 text-center text-zinc-600 text-sm">
        &copy; {{ date('Y') }} Grawlix Design. All rights reserved.
    </footer>

</body>
</html>
