<header class="fixed top-0 left-0 right-0 z-50 w-full bg-brand-green border-b border-brand-green-dark">
    <nav class="flex items-center justify-between px-6 h-12 max-w-6xl mx-auto">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-0.5 font-bold text-xl tracking-tight select-none">
            <span class="text-brand-green-text">Grawlix</span>
            <span class="text-brand-green-dark ml-1.5">Design</span>
        </a>

        {{-- Desktop nav --}}
        <ul class="hidden md:flex items-center gap-6 text-sm font-medium text-brand-green-text">
            <li><a href="{{ route('home') }}" class="hover:text-brand-green-dark transition-colors">Home</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-brand-green-dark transition-colors">Contact</a></li>
            <li><a href="{{ route('fun') }}" class="hover:text-brand-green-dark transition-colors">Fun</a></li>
        </ul>

        {{-- Mobile hamburger --}}
        <button id="mobile-menu-toggle" class="md:hidden flex flex-col justify-center gap-1 w-6 h-6 group" aria-label="Toggle menu">
            <span class="block h-px bg-brand-green-text group-hover:bg-brand-green-dark transition-colors"></span>
            <span class="block h-px bg-brand-green-text group-hover:bg-brand-green-dark transition-colors"></span>
            <span class="block h-px bg-brand-green-text group-hover:bg-brand-green-dark transition-colors"></span>
        </button>

    </nav>

    {{-- Mobile menu --}}
    <div id="mobile-menu" class="hidden md:hidden border-t border-brand-green-muted bg-brand-green-bg">
        <ul class="flex flex-col px-6 py-3 gap-3 text-sm font-medium text-brand-green-text">
            <li><a href="{{ route('home') }}" class="hover:text-brand-green-dark transition-colors block">Home</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-brand-green-dark transition-colors block">Contact</a></li>
            <li><a href="{{ route('fun') }}" class="hover:text-brand-green-dark transition-colors block">Fun</a></li>
        </ul>
    </div>
</header>

<script>
    document.getElementById('mobile-menu-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
