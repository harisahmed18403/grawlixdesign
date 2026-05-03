@extends('layouts.app')

@section('title', 'Fun — Grawlix Design')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-20 text-center">
    <p class="text-violet-400 text-sm font-semibold uppercase tracking-widest mb-4">Just for kicks</p>
    <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-white mb-4">
        This page is for fun. 🎉
    </h1>
    <p class="text-zinc-400 text-lg mb-16 max-w-xl mx-auto">
        Every great studio needs a page that's purely for the joy of it. This is ours.
    </p>

    <div id="color-bg" class="rounded-3xl p-16 mb-12 transition-all duration-700 cursor-pointer select-none"
         style="background: linear-gradient(135deg, #7c3aed, #2563eb);">
        <p class="text-white text-2xl font-bold mb-2">Click me!</p>
        <p id="color-label" class="text-white/70 text-sm">Each click picks a new gradient</p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-12">
        @foreach(['💜 Purple', '⚡ Electric', '🌊 Ocean', '🌿 Forest', '🔥 Fire', '🌸 Bloom', '🌙 Night', '☀️ Sun'] as $label)
        <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-4 text-zinc-300 text-sm font-medium hover:border-violet-500/50 hover:text-white transition-colors cursor-default">
            {{ $label }}
        </div>
        @endforeach
    </div>

    <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-8 max-w-md mx-auto">
        <p class="text-zinc-500 text-xs uppercase tracking-widest mb-3">Random design quote</p>
        <blockquote id="quote" class="text-white text-lg font-medium leading-snug mb-4">
            "Design is not just what it looks like. Design is how it works."
        </blockquote>
        <p id="author" class="text-violet-400 text-sm">— Steve Jobs</p>
        <button onclick="newQuote()" class="mt-6 text-xs text-zinc-500 hover:text-white transition-colors underline underline-offset-4">
            Another one
        </button>
    </div>
</section>

<script>
const gradients = [
    ['#7c3aed', '#2563eb'],
    ['#db2777', '#f97316'],
    ['#0ea5e9', '#6366f1'],
    ['#10b981', '#0891b2'],
    ['#f59e0b', '#ef4444'],
    ['#8b5cf6', '#ec4899'],
    ['#1e293b', '#334155'],
    ['#f43f5e', '#fb923c'],
];

let lastIdx = 0;
document.getElementById('color-bg').addEventListener('click', () => {
    let idx;
    do { idx = Math.floor(Math.random() * gradients.length); } while (idx === lastIdx);
    lastIdx = idx;
    const [a, b] = gradients[idx];
    document.getElementById('color-bg').style.background = `linear-gradient(135deg, ${a}, ${b})`;
});

const quotes = [
    ['"Design is not just what it looks like. Design is how it works."', '— Steve Jobs'],
    ['"Good design is obvious. Great design is transparent."', '— Joe Sparano'],
    ['"Simplicity is the ultimate sophistication."', '— Leonardo da Vinci'],
    ['"The details are not the details. They make the design."', '— Charles Eames'],
    ['"Design is thinking made visual."', '— Saul Bass'],
    ['"Less, but better."', '— Dieter Rams'],
];

let lastQ = 0;
function newQuote() {
    let i;
    do { i = Math.floor(Math.random() * quotes.length); } while (i === lastQ);
    lastQ = i;
    document.getElementById('quote').textContent = quotes[i][0];
    document.getElementById('author').textContent = quotes[i][1];
}
</script>
@endsection
