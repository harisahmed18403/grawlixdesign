<section id="web-design" class="w-full font-sans text-zinc-800">

    {{-- Fake browser chrome --}}
    <div class="w-full bg-zinc-200 flex items-center gap-2 px-4 py-2 border-b border-zinc-300">
        <div class="flex gap-1.5">
            <span class="w-3 h-3 rounded-full bg-red-400 inline-block"></span>
            <span class="w-3 h-3 rounded-full bg-yellow-400 inline-block"></span>
            <span class="w-3 h-3 rounded-full bg-green-400 inline-block"></span>
        </div>
        <div class="flex-1 bg-white rounded px-3 py-1 text-xs text-zinc-400 ml-2 max-w-sm">
            yourrestaurant.co.uk
        </div>
    </div>

    {{-- Fake website --}}
    <div class="w-full bg-white">

        {{-- Nav --}}
        <header class="flex items-center justify-between px-8 py-4 border-b border-zinc-100 shadow-sm">
            <div class="font-bold text-xl tracking-tight text-amber-800 italic">Your Restaurant Name</div>
            <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-zinc-600">
                <a href="#" class="text-amber-700 font-semibold">Home</a>
                <a href="#" class="hover:text-amber-700 transition-colors">Menu</a>
                <a href="#" class="hover:text-amber-700 transition-colors">About</a>
                <a href="#" class="hover:text-amber-700 transition-colors">FAQ</a>
                <a href="#" class="hover:text-amber-700 transition-colors">Contact</a>
            </nav>
            <button class="bg-amber-700 text-white text-sm font-semibold px-5 py-2 rounded-full hover:bg-amber-800 transition-colors">
                Book a Table
            </button>
        </header>

        {{-- Hero --}}
        <section class="flex flex-col items-center text-center px-8 py-16 bg-linear-to-b from-amber-50 to-white">
            <span class="text-xs font-semibold uppercase tracking-widest text-amber-700 mb-3">Authentic Italian · Lancaster City Centre</span>
            <h1 class="text-4xl font-extrabold text-zinc-900 max-w-2xl leading-tight mb-4">
                A Taste of Italy, Right on Your Doorstep
            </h1>
            <p class="text-zinc-500 max-w-xl text-base mb-8">
                Handmade pasta, wood-fired pizza, and warm hospitality — just as it should be. Open Tuesday to Sunday, lunch and dinner.
            </p>
            <div class="flex gap-3">
                <button class="bg-amber-700 text-white font-semibold px-6 py-2.5 rounded-full hover:bg-amber-800 transition-colors text-sm">
                    Reserve a Table
                </button>
            </div>
        </section>

        {{-- Menu --}}
        <section class="px-8 py-10 border-t border-b border-zinc-100 bg-white">
            <h2 class="text-xl font-bold text-zinc-900 mb-1">Our Menu</h2>
            <p class="text-xs text-zinc-400 mb-8 uppercase tracking-widest">Seasonal · Handmade · Always Fresh</p>

            <div class="grid grid-cols-3 gap-10">

                {{-- Starters --}}
                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-amber-700 mb-4 pb-2 border-b border-amber-100">Starters</h3>
                    <ul class="flex flex-col gap-4">
                        @foreach([
                            ['name' => 'Burrata & Heritage Tomato', 'desc' => 'Whipped cream, basil oil, sea salt', 'price' => '£9.50'],
                            ['name' => 'Beef Carpaccio', 'desc' => 'Rocket, capers, shaved Parmesan', 'price' => '£11.00'],
                            ['name' => 'Zuppa di Ceci', 'desc' => 'Chickpea soup, rosemary, sourdough', 'price' => '£7.50'],
                            ['name' => 'Arancini al Ragù', 'desc' => 'Slow-cooked beef, mozzarella, tomato', 'price' => '£8.00'],
                        ] as $item)
                            <li class="flex justify-between items-start gap-2">
                                <div>
                                    <p class="text-sm font-medium text-zinc-800 leading-snug">{{ $item['name'] }}</p>
                                    <p class="text-xs text-zinc-400 mt-0.5">{{ $item['desc'] }}</p>
                                </div>
                                <span class="text-sm font-semibold text-amber-700 shrink-0">{{ $item['price'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Mains --}}
                <div class="border-x border-zinc-100 px-10">
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-amber-700 mb-4 pb-2 border-b border-amber-100">Mains</h3>
                    <ul class="flex flex-col gap-4">
                        @foreach([
                            ['name' => 'Tagliatelle al Ragù', 'desc' => 'Slow-braised beef, fresh egg pasta', 'price' => '£16.50'],
                            ['name' => 'Pizza Margherita', 'desc' => 'San Marzano tomato, fior di latte', 'price' => '£13.00'],
                            ['name' => 'Branzino al Forno', 'desc' => 'Roasted sea bass, caponata, lemon', 'price' => '£22.00'],
                            ['name' => 'Risotto ai Funghi', 'desc' => 'Wild mushroom, truffle oil, Grana Padano', 'price' => '£17.50'],
                        ] as $item)
                            <li class="flex justify-between items-start gap-2">
                                <div>
                                    <p class="text-sm font-medium text-zinc-800 leading-snug">{{ $item['name'] }}</p>
                                    <p class="text-xs text-zinc-400 mt-0.5">{{ $item['desc'] }}</p>
                                </div>
                                <span class="text-sm font-semibold text-amber-700 shrink-0">{{ $item['price'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Desserts --}}
                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-widest text-amber-700 mb-4 pb-2 border-b border-amber-100">Desserts</h3>
                    <ul class="flex flex-col gap-4">
                        @foreach([
                            ['name' => 'Tiramisù', 'desc' => 'Espresso, mascarpone, Savoiardi', 'price' => '£7.50'],
                            ['name' => 'Panna Cotta', 'desc' => 'Vanilla, seasonal berry compote', 'price' => '£6.50'],
                            ['name' => 'Cannoli Siciliani', 'desc' => 'Ricotta, candied orange, pistachio', 'price' => '£6.00'],
                            ['name' => 'Affogato al Caffè', 'desc' => 'Double espresso, vanilla gelato', 'price' => '£5.50'],
                        ] as $item)
                            <li class="flex justify-between items-start gap-2">
                                <div>
                                    <p class="text-sm font-medium text-zinc-800 leading-snug">{{ $item['name'] }}</p>
                                    <p class="text-xs text-zinc-400 mt-0.5">{{ $item['desc'] }}</p>
                                </div>
                                <span class="text-sm font-semibold text-amber-700 shrink-0">{{ $item['price'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </section>

        {{-- Google Reviews --}}
        <section class="px-8 py-12 bg-zinc-50">
            <div class="flex items-center gap-3 mb-6">
                <svg class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l3.66-2.84z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                <div>
                    <div class="flex items-center gap-1">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/></svg>
                        @endfor
                        <span class="text-sm font-bold text-zinc-800 ml-1">4.9</span>
                        <span class="text-xs text-zinc-400 ml-1">· 312 reviews</span>
                    </div>
                    <p class="text-xs text-zinc-500 mt-0.5">Google Reviews</p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                @foreach([
                    ['name' => 'Claire Davenport', 'time' => '1 week ago', 'text' => 'Best pasta I\'ve had outside of Italy. The cacio e pepe was silky and perfectly seasoned. Staff were so welcoming — we\'ll definitely be back.'],
                    ['name' => 'Marcus Webb', 'time' => '3 weeks ago', 'text' => 'Booked for our anniversary and they really made the evening special. The tiramisu is a must. Atmosphere is cosy and romantic without being stuffy.'],
                    ['name' => 'Aisha Patel', 'time' => '2 months ago', 'text' => 'Genuinely the best food in Lancaster. The sourdough base is incredible and the wood fire gives it that authentic char. Don\'t skip the burrata starter.'],
                ] as $review)
                    <div class="bg-white rounded-xl border border-zinc-200 p-5 flex flex-col gap-3 shadow-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-amber-100 flex items-center justify-center text-amber-700 font-bold text-sm">
                                {{ substr($review['name'], 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-zinc-800 leading-none">{{ $review['name'] }}</p>
                                <p class="text-xs text-zinc-400 mt-0.5">{{ $review['time'] }}</p>
                            </div>
                        </div>
                        <div class="flex gap-0.5">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-3.5 h-3.5 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.561-.955L10 0l2.951 5.955 6.561.955-4.756 4.635 1.122 6.545z"/></svg>
                            @endfor
                        </div>
                        <p class="text-xs text-zinc-600 leading-relaxed">{{ $review['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- CTA banner --}}
        <section class="flex items-center justify-between px-8 py-8 bg-amber-700">
            <div>
                <p class="text-white font-bold text-lg leading-tight">Tables fill up fast on weekends.</p>
                <p class="text-white/70 text-sm mt-1">Reserve yours online in under a minute.</p>
            </div>
            <button class="bg-white text-amber-700 font-bold text-sm px-6 py-2.5 rounded-full hover:bg-amber-50 transition-colors shrink-0">
                Book Now
            </button>
        </section>

        {{-- Footer --}}
        <footer class="px-8 py-6 bg-zinc-900 flex items-center justify-between">
            <p class="text-zinc-500 text-xs">© 2025 Your Restaurant Name. All rights reserved.</p>
            <div class="flex gap-6 text-xs text-zinc-500">
                <a href="#" class="hover:text-white transition-colors">Privacy</a>
                <a href="#" class="hover:text-white transition-colors">Allergens</a>
                <a href="#" class="hover:text-white transition-colors">Contact</a>
            </div>
        </footer>

    </div>
</section>
