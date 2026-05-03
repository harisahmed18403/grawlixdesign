@extends('layouts.app')

@section('title', 'Grawlix Design — Web Design Studio')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-28 text-center">
    <p class="text-violet-400 text-sm font-semibold uppercase tracking-widest mb-4">Web Design Studio</p>
    <h1 class="text-5xl sm:text-7xl font-extrabold tracking-tight text-white leading-none mb-6">
        We design websites<br>people actually use.
    </h1>
    <p class="text-zinc-400 text-lg sm:text-xl max-w-2xl mx-auto mb-10">
        Grawlix Design crafts fast, beautiful, and purposeful websites for small businesses, creators, and bold ideas.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{ route('contact') }}" class="bg-violet-600 hover:bg-violet-500 text-white font-semibold px-8 py-3 rounded-lg transition-colors">
            Start a project
        </a>
        <a href="{{ route('fun') }}" class="border border-zinc-700 hover:border-zinc-500 text-zinc-300 hover:text-white font-semibold px-8 py-3 rounded-lg transition-colors">
            See something fun
        </a>
    </div>
</section>

<section class="max-w-5xl mx-auto px-6 pb-28">
    <h2 class="text-2xl font-bold text-white mb-10 text-center">What we do</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        @foreach ([
            ['icon' => '✦', 'title' => 'Design', 'desc' => 'Clean, modern interfaces built around your brand and your users.'],
            ['icon' => '⚡', 'title' => 'Development', 'desc' => 'Fast, accessible sites built on solid, maintainable code.'],
            ['icon' => '◎', 'title' => 'Strategy', 'desc' => 'We think about goals first so every pixel earns its place.'],
        ] as $service)
        <div class="bg-zinc-900 border border-zinc-800 rounded-2xl p-8 hover:border-violet-500/40 transition-colors">
            <div class="text-violet-400 text-2xl mb-4">{{ $service['icon'] }}</div>
            <h3 class="text-white font-semibold text-lg mb-2">{{ $service['title'] }}</h3>
            <p class="text-zinc-400 text-sm leading-relaxed">{{ $service['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>
@endsection
