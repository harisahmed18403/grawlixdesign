<section id="online-business-integration" class="w-full font-sans bg-white min-h-full flex flex-col">

    {{-- Fake Google chrome bar --}}
    <div class="flex items-center gap-3 px-4 py-2 bg-zinc-100 border-b border-zinc-300 shrink-0">
        <div class="flex gap-1.5">
            <span class="w-3 h-3 rounded-full bg-red-400 inline-block"></span>
            <span class="w-3 h-3 rounded-full bg-yellow-400 inline-block"></span>
            <span class="w-3 h-3 rounded-full bg-green-400 inline-block"></span>
        </div>
        <div class="flex items-center gap-2 flex-1 bg-white rounded-full border border-zinc-300 px-3 py-1 max-w-lg text-xs text-zinc-500">
            <svg class="w-3 h-3 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/></svg>
            google.com/search?q=italian+restaurant+lancaster
        </div>
    </div>

    {{-- Google header --}}
    <div class="flex items-center gap-4 px-6 py-3 border-b border-zinc-200 shrink-0">
        {{-- Google logo --}}
        <span class="font-bold text-2xl tracking-tight select-none">
            <span class="text-[#4285F4]">G</span><span class="text-[#EA4335]">o</span><span class="text-[#FBBC05]">o</span><span class="text-[#4285F4]">g</span><span class="text-[#34A853]">l</span><span class="text-[#EA4335]">e</span>
        </span>

        {{-- Search bar --}}
        <div class="flex items-center flex-1 max-w-xl border border-zinc-300 rounded-full px-4 py-2 shadow-sm gap-2 hover:shadow-md transition-shadow">
            <span class="text-sm text-zinc-700 flex-1">italian restaurant lancaster</span>
            <svg class="w-4 h-4 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>

        {{-- Search tools --}}
        <div class="flex items-center gap-1 text-xs text-zinc-500 ml-2">
            <button class="hover:bg-zinc-100 px-3 py-1.5 rounded-full transition-colors">Settings</button>
            <button class="hover:bg-zinc-100 px-3 py-1.5 rounded-full transition-colors">Tools</button>
        </div>
    </div>

    {{-- Search tabs --}}
    <div class="flex items-center gap-1 px-6 border-b border-zinc-200 shrink-0">
        @foreach(['All', 'Maps', 'Images', 'News', 'Videos', 'Shopping', 'More'] as $tab)
            <a href="#" class="px-4 py-2.5 text-xs font-medium transition-colors border-b-2 -mb-px
                {{ $tab === 'All' ? 'border-[#1a73e8] text-[#1a73e8]' : 'border-transparent text-zinc-600 hover:text-zinc-900 hover:border-zinc-300' }}">
                {{ $tab }}
            </a>
        @endforeach
        <span class="ml-2 text-xs text-zinc-400">About 14,200 results (0.43 seconds)</span>
    </div>

    {{-- Body --}}
    <div class="flex flex-1 px-6 py-4 gap-8 min-h-0">

        {{-- Left: results --}}
        <div class="flex flex-col gap-4 max-w-xl w-full">

            {{-- Google Ad 1 --}}
            <div class="flex flex-col gap-0.5">
                <span class="text-xs font-medium text-zinc-500 border border-zinc-400 rounded px-1 py-px w-fit text-[10px] leading-none mb-1">Sponsored</span>
                <a href="#" class="text-[#1a73e8] text-lg font-medium hover:underline leading-snug">Your Restaurant Name · Book a Table Online</a>
                <span class="text-xs text-[#006621]">yourrestaurant.co.uk › book</span>
                <p class="text-xs text-zinc-600 leading-relaxed">Reserve your table at Lancaster's finest Italian restaurant. Fresh pasta, wood-fired pizza & award-winning tiramisu. Open Tue–Sun.</p>
                <div class="flex gap-3 mt-1">
                    <a href="#" class="text-xs text-[#1a73e8] hover:underline">Book a Table</a>
                    <a href="#" class="text-xs text-[#1a73e8] hover:underline">View Menu</a>
                    <a href="#" class="text-xs text-[#1a73e8] hover:underline">Find Us</a>
                </div>
            </div>

            {{-- Google Ad 2 --}}
            <div class="flex flex-col gap-0.5">
                <span class="text-xs font-medium text-zinc-500 border border-zinc-400 rounded px-1 py-px w-fit text-[10px] leading-none mb-1">Sponsored</span>
                <a href="#" class="text-[#1a73e8] text-lg font-medium hover:underline leading-snug">Your Restaurant Name · Lunch & Dinner in Lancaster</a>
                <span class="text-xs text-[#006621]">yourrestaurant.co.uk › offers</span>
                <p class="text-xs text-zinc-600 leading-relaxed">Exclusive online offer — 10% off your first visit when you book through our website. Authentic Italian cuisine in the heart of Lancaster.</p>
            </div>

            <hr class="border-zinc-200">

            {{-- Organic result 1 --}}
            <div class="flex flex-col gap-0.5">
                <div class="flex items-center gap-2 mb-0.5">
                    <div class="w-4 h-4 rounded-full bg-amber-100 flex items-center justify-center text-amber-700 font-bold text-[9px]">Y</div>
                    <span class="text-xs text-zinc-600">yourrestaurant.co.uk</span>
                </div>
                <a href="#" class="text-[#1a73e8] text-lg font-medium hover:underline leading-snug">Your Restaurant Name — Authentic Italian, Lancaster</a>
                <p class="text-xs text-zinc-600 leading-relaxed">Welcome to Your Restaurant Name, Lancaster's favourite Italian restaurant. Handmade pasta, wood-fired pizza, and a warm atmosphere perfect for any occasion.</p>
            </div>

            {{-- Organic result 2 --}}
            <div class="flex flex-col gap-0.5">
                <span class="text-xs text-zinc-600">tripadvisor.co.uk › Lancaster</span>
                <a href="#" class="text-[#1a73e8] text-lg font-medium hover:underline leading-snug">Your Restaurant Name, Lancaster — TripAdvisor</a>
                <div class="flex items-center gap-1 my-0.5">
                    <div class="flex">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-3 h-3 text-[#00aa6c] fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/></svg>
                        @endfor
                    </div>
                    <span class="text-xs text-zinc-500">5.0 · 287 reviews · ££</span>
                </div>
                <p class="text-xs text-zinc-600 leading-relaxed">Rated #1 of 84 Restaurants in Lancaster. "Absolutely exceptional food and service. The best pasta I've had outside of Florence."</p>
            </div>

            {{-- Organic result 3 --}}
            <div class="flex flex-col gap-0.5">
                <span class="text-xs text-zinc-600">designmynight.com › Lancaster › Restaurants</span>
                <a href="#" class="text-[#1a73e8] text-lg font-medium hover:underline leading-snug">Best Italian Restaurants in Lancaster 2025</a>
                <p class="text-xs text-zinc-600 leading-relaxed">Your Restaurant Name tops our list of the best Italian restaurants in Lancaster for 2025, praised for its authentic recipes and outstanding service.</p>
            </div>

        </div>

        {{-- Right: Knowledge panel + Meta ad --}}
        <div class="flex flex-col gap-4 w-72 shrink-0">

            {{-- Google Business Knowledge Panel --}}
            <div class="border border-zinc-200 rounded-xl overflow-hidden shadow-sm">

                {{-- Photo strip --}}
                <div class="grid grid-cols-3 gap-px bg-zinc-200 h-24">
                    <div class="bg-amber-100 flex items-center justify-center text-2xl">🍝</div>
                    <div class="bg-amber-50 flex items-center justify-center text-2xl">🍕</div>
                    <div class="bg-orange-50 flex items-center justify-center text-2xl">🍷</div>
                </div>

                <div class="p-4 flex flex-col gap-3">
                    <div>
                        <h3 class="font-bold text-lg text-zinc-900 leading-tight">Your Restaurant Name</h3>
                        <p class="text-xs text-zinc-500 mt-0.5">Italian Restaurant · Lancaster</p>

                        <div class="flex items-center gap-1.5 mt-1.5">
                            <span class="text-sm font-bold text-zinc-800">4.9</span>
                            <div class="flex">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-3.5 h-3.5 text-[#FBBC05] fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/></svg>
                                @endfor
                            </div>
                            <a href="#" class="text-xs text-[#1a73e8] hover:underline">312 reviews</a>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button class="flex-1 text-xs border border-zinc-300 rounded-full py-1.5 hover:bg-zinc-50 transition-colors text-zinc-700">Directions</button>
                        <button class="flex-1 text-xs border border-zinc-300 rounded-full py-1.5 hover:bg-zinc-50 transition-colors text-zinc-700">Website</button>
                        <button class="flex-1 text-xs border border-zinc-300 rounded-full py-1.5 hover:bg-zinc-50 transition-colors text-zinc-700">Save</button>
                    </div>

                    <div class="flex flex-col gap-2 text-xs text-zinc-600">
                        <div class="flex items-start gap-2">
                            <svg class="w-3.5 h-3.5 text-zinc-400 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>12 Market Street, Lancaster, LA1 1HS</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-zinc-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span><span class="text-[#188038] font-medium">Open now</span> · Closes 10:00 pm</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-zinc-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 9V7a2 2 0 012-2z"/></svg>
                            <a href="#" class="text-[#1a73e8] hover:underline">01524 000 000</a>
                        </div>
                    </div>

                    {{-- Top review --}}
                    <div class="border-t border-zinc-100 pt-3">
                        <p class="text-xs font-medium text-zinc-700 mb-2">Reviews</p>
                        <div class="flex flex-col gap-2">
                            @foreach([
                                ['name' => 'Claire D.', 'text' => 'Best pasta I\'ve had outside of Italy. Absolutely incredible.'],
                                ['name' => 'Marcus W.', 'text' => 'Made our anniversary so special. The tiramisu is a must.'],
                            ] as $r)
                                <div class="flex flex-col gap-0.5">
                                    <div class="flex items-center gap-1.5">
                                        <div class="w-5 h-5 rounded-full bg-[#4285F4] flex items-center justify-center text-white text-[9px] font-bold">{{ substr($r['name'], 0, 1) }}</div>
                                        <span class="text-xs font-medium text-zinc-700">{{ $r['name'] }}</span>
                                        <div class="flex ml-auto">
                                            @for($i = 0; $i < 5; $i++)
                                                <svg class="w-2.5 h-2.5 text-[#FBBC05] fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/></svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="text-xs text-zinc-500 pl-6 leading-relaxed">{{ $r['text'] }}</p>
                                </div>
                            @endforeach
                        </div>
                        <a href="#" class="text-xs text-[#1a73e8] hover:underline mt-2 inline-block">See all reviews</a>
                    </div>
                </div>
            </div>

            {{-- Meta Ad --}}
            <div class="border border-zinc-200 rounded-xl overflow-hidden shadow-sm">
                {{-- Facebook header --}}
                <div class="flex items-center justify-between px-3 py-2 bg-[#1877F2]">
                    <span class="text-white font-bold text-sm">f</span>
                    <span class="text-white/80 text-xs">Sponsored · Facebook & Instagram</span>
                </div>
                {{-- Ad content --}}
                <div class="bg-[#f0f2f5]">
                    <div class="bg-amber-100 h-24 flex items-center justify-center">
                        <div class="text-center">
                            <p class="font-bold text-amber-800 italic text-sm">Your Restaurant Name</p>
                            <p class="text-amber-700 text-xs mt-0.5">Authentic Italian · Lancaster</p>
                        </div>
                    </div>
                    <div class="bg-white px-3 py-2.5 flex items-center justify-between border-t border-zinc-200">
                        <div>
                            <p class="text-xs font-semibold text-zinc-800">10% off your first visit</p>
                            <p class="text-xs text-zinc-500">yourrestaurant.co.uk · Book online</p>
                        </div>
                        <button class="text-xs bg-[#1877F2] text-white font-semibold px-3 py-1.5 rounded shrink-0">Book Now</button>
                    </div>
                    <div class="px-3 pb-2 pt-1 flex items-center gap-4 text-xs text-zinc-500">
                        <button class="hover:text-zinc-700 transition-colors">👍 Like</button>
                        <button class="hover:text-zinc-700 transition-colors">💬 Comment</button>
                        <button class="hover:text-zinc-700 transition-colors">↗ Share</button>
                    </div>
                </div>
                {{-- Instagram preview --}}
                <div class="border-t border-zinc-200 bg-white px-3 py-2.5 flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke="url(#ig)" stroke-width="2"/><circle cx="12" cy="12" r="4" stroke="url(#ig)" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1" fill="url(#ig)"/><defs><linearGradient id="ig" x1="0" y1="24" x2="24" y2="0"><stop offset="0%" stop-color="#f09433"/><stop offset="25%" stop-color="#e6683c"/><stop offset="50%" stop-color="#dc2743"/><stop offset="75%" stop-color="#cc2366"/><stop offset="100%" stop-color="#bc1888"/></linearGradient></defs></svg>
                    <p class="text-xs text-zinc-500">Also shown on <span class="font-medium text-zinc-700">Instagram</span> · Reached <span class="font-medium text-zinc-700">4,200</span> local users this week</p>
                </div>
            </div>

        </div>
    </div>

</section>
