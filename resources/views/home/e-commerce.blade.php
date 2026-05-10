<section id="e-commerce" class="flex w-full min-h-full">

    {{-- Left sidebar --}}
    <div id="left" class="flex flex-col w-48 bg-brand-purple shrink-0">
        <div class="px-4 py-5 text-white font-bold text-lg border-b border-white/20">
            ShopPanel
        </div>
        <nav class="flex flex-col mt-2">
            @foreach([
                        ['label' => 'Dashboard', 'active' => false, 'badge' => null],
                        ['label' => 'Orders', 'active' => true, 'badge' => '12'],
                        ['label' => 'Products', 'active' => false, 'badge' => null],
                        ['label' => 'Customers', 'active' => false, 'badge' => null],
                        ['label' => 'Reports', 'active' => false, 'badge' => '3'],
                        ['label' => 'Settings', 'active' => false, 'badge' => null],
                    ] as $item)
                    <a href="#"
                       class="flex items-center justify-between px-4 py-2.5 text-sm font-medium transition-colors
                              {{ $item['active']
                ? 'bg-white/20 text-white'
                : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                        {{ $item['label'] }}
                        @if($item['badge'])
                            <span class="bg-brand-red text-white text-xs font-bold px-1.5 py-0.5 rounded-full">
                                {{ $item['badge'] }}
                            </span>
                        @endif
                    </a>
            @endforeach
        </nav>
          
     </div>

    {{-- Main area --}}
    <div class="flex flex-col flex-1 min-w-0">

        {{-- Top bar --}}
        <div id="top" class="flex items-center justify-between px-5 bg-white border-b border-zinc-200 shrink-0" style="height: 48px;">
            <nav class="flex items-center gap-1 text-sm text-zinc-400">
                <span>Home</span>
             
                      <span c
   l                ass="mx-1">/</span>
                <span>E-commerce</span>
                <span class="mx-1">/</span>
                <span class="text-brand-purple font-medium">Orders</span>
            </nav>
            <div class="flex items-center gap-3">
                <button class="text-sm text-brand-red hover:text-brand-red/70 font-medium transition-colors">Bulk Delete</button>
                <button class="bg-brand-green hover:bg-brand-green/80 text-white text-sm font-medium px-4 py-1.5 rounded transition-colors">
                    + New Order
                </button>
            </div>
        </div>

        {{-- Filters --}}
        <div class="flex items-center gap-6 px-4 py-2.5 border-b border-zinc-200 bg-zinc-50 shrink-0">
            <div class="flex items-center gap-2">
                <label for="filter-platform" class="text-xs font-semibold text-zinc-400 uppercase tracking-wider">Platform</label>
                <select id="filter-platform" class="text-sm border border-zinc-300 rounded px-2 py-1 text-zinc-700 bg-white focus:outline-none focus:border-brand-purple">
                    <option value="">All</option>
                    <option value="Amazon">Amazon</option>
                    <option value="eBay">eBay</option>
                    <option value="Website">Website</option>
                </select>
            </div>
            <div class="flex items-center gap-2">
                <label for="filter-items" class="text-xs font-semibold text-zinc-400 uppercase tracking-wider">Items</label>
                <input id="filter-items" type="text" placeholder="Search by item name…"
                    class="text-sm border border-zinc-300 rounded px-2 py-1 text-zinc-700 bg-white focus:outline-none focus:border-brand-purple w-52">
            </div>
        </div>

        {{-- Grid --}}
        <div id="ag-grid-table" class="flex-1 w-full"></div>

    </div>

</section>
@vite('resources/js/ecommerce.js')
