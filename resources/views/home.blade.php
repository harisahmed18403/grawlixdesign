@extends('layouts.app')

@section('title', 'Grawlix Design — Web Design Studio')

@section('content')

{{-- Hero --}}
<section class="max-w-5xl mx-auto px-6 pt-20 pb-12 flex flex-col items-center text-center">
    <img src="/images/3dLogoFront.png"
         alt="Grawlix Design logo"
         class="w-full sm:w-64 mb-10">

    <p class="text-brand-green text-sm font-semibold uppercase tracking-widest mb-4">Web Design Studio</p>
    <h1 class="text-5xl sm:text-7xl font-extrabold tracking-tight text-zinc-900 leading-none mb-6">
        We design websites<br>people actually use.
    </h1>
    <p class="text-zinc-500 text-lg sm:text-xl max-w-2xl mx-auto mb-10">
        Grawlix Design crafts fast, beautiful, and purposeful websites for small businesses, creators, and bold ideas.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{ route('contact') }}" class="bg-brand-green hover:bg-brand-green/80 text-white font-semibold px-8 py-3 rounded-lg transition-colors">
            Start a project
        </a>
        <a href="{{ route('fun') }}" class="border border-zinc-300 hover:border-brand-green text-zinc-600 hover:text-zinc-900 font-semibold px-8 py-3 rounded-lg transition-colors">
            See something fun
        </a>
    </div>
</section>

{{-- Services --}}
<section class="max-w-5xl mx-auto px-6 pb-28">
    <h2 class="text-2xl font-bold text-zinc-900 mb-10 text-center">What we do</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        @foreach ([
            ['icon' => '✦', 'title' => 'Design', 'color' => 'text-brand-green', 'desc' => 'Clean, modern interfaces built around your brand and your users.'],
            ['icon' => '⚡', 'title' => 'Development', 'color' => 'text-brand-red', 'desc' => 'Fast, accessible sites built on solid, maintainable code.'],
            ['icon' => '◎', 'title' => 'Strategy', 'color' => 'text-brand-green', 'desc' => 'We think about goals first so every pixel earns its place.'],
        ] as $service)
        <div class="bg-zinc-50 border border-zinc-200 rounded-2xl p-8 hover:border-brand-green/60 transition-colors">
            <div class="{{ $service['color'] }} text-2xl mb-4">{{ $service['icon'] }}</div>
            <h3 class="text-zinc-900 font-semibold text-lg mb-2">{{ $service['title'] }}</h3>
            <p class="text-zinc-500 text-sm leading-relaxed">{{ $service['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

@endsection
