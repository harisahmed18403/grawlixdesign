@extends('layouts.app')

@section('title', 'Contact — Grawlix Design')

@section('content')
<section class="max-w-2xl mx-auto px-6 py-28">
    <p class="text-brand-green text-sm font-semibold uppercase tracking-widest mb-4 text-center">Get in touch</p>
    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-zinc-900 text-center mb-4">
        Let's build something.
    </h1>
    <p class="text-zinc-500 text-center mb-12">
        Have a project in mind? Fill out the form and we'll get back to you within one business day.
    </p>

    <form class="space-y-6" action="#" method="POST">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-zinc-700 mb-2">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name"
                    class="w-full bg-white border border-zinc-300 rounded-lg px-4 py-3 text-zinc-900 placeholder-zinc-400 focus:outline-none focus:border-brand-green transition-colors">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-zinc-700 mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="you@example.com"
                    class="w-full bg-white border border-zinc-300 rounded-lg px-4 py-3 text-zinc-900 placeholder-zinc-400 focus:outline-none focus:border-brand-green transition-colors">
            </div>
        </div>
        <div>
            <label for="subject" class="block text-sm font-medium text-zinc-700 mb-2">What are you looking for?</label>
            <select id="subject" name="subject"
                class="w-full bg-white border border-zinc-300 rounded-lg px-4 py-3 text-zinc-700 focus:outline-none focus:border-brand-green transition-colors">
                <option value="">Select a service…</option>
                <option value="design">Website Design</option>
                <option value="dev">Website Development</option>
                <option value="both">Design + Development</option>
                <option value="other">Something else</option>
            </select>
        </div>
        <div>
            <label for="message" class="block text-sm font-medium text-zinc-700 mb-2">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Tell us about your project…"
                class="w-full bg-white border border-zinc-300 rounded-lg px-4 py-3 text-zinc-900 placeholder-zinc-400 focus:outline-none focus:border-brand-green transition-colors resize-none"></textarea>
        </div>
        <button type="submit"
            class="w-full bg-brand-green hover:bg-brand-green/80 text-white font-semibold py-3 rounded-lg transition-colors">
            Send message
        </button>
    </form>
</section>
@endsection
