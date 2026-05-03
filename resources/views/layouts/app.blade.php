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
            <a href="{{ route('home') }}" class="hover:opacity-80 transition-opacity">
                <img src="/images/3dLogoFront.png" alt="Grawlix Design" class="h-10 w-auto rounded-lg bg-white px-2 py-1">
            </a>
            <ul class="flex gap-8 text-sm font-medium text-zinc-400">
                <li><a href="{{ route('home') }}" class="hover:text-brand-green transition-colors {{ request()->routeIs('home') ? 'text-brand-green' : '' }}">Home</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-brand-green transition-colors {{ request()->routeIs('contact') ? 'text-brand-green' : '' }}">Contact</a></li>
                <li><a href="{{ route('fun') }}" class="hover:text-brand-green transition-colors {{ request()->routeIs('fun') ? 'text-brand-green' : '' }}">Fun</a></li>
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
