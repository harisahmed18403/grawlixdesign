<section id="enterprise-tools" class="w-full font-sans text-zinc-800 bg-zinc-950 min-h-full flex flex-col">

    {{-- Top bar --}}
    <div class="flex items-center justify-between px-5 py-2.5 bg-zinc-900 border-b border-zinc-800 shrink-0">
        <div class="flex items-center gap-3">
            <span class="text-white font-bold text-sm tracking-tight">FinanceOS</span>
            <span class="text-zinc-600 text-xs">|</span>
            <nav class="flex items-center gap-4 text-xs text-zinc-400">
                <a href="#" class="text-brand-purple font-medium">Dashboard</a>
                <a href="#" class="hover:text-zinc-200 transition-colors">Reports</a>
                <a href="#" class="hover:text-zinc-200 transition-colors">Invoices</a>
                <a href="#" class="hover:text-zinc-200 transition-colors">Payroll</a>
                <a href="#" class="hover:text-zinc-200 transition-colors">Forecasting</a>
                <a href="#" class="hover:text-zinc-200 transition-colors">Audit Log</a>
                <a href="#" class="hover:text-zinc-200 transition-colors">Settings</a>
            </nav>
        </div>
        <div class="flex items-center gap-2">
            <button class="text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-300 px-3 py-1.5 rounded transition-colors">Import Files</button>
            <button class="text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-300 px-3 py-1.5 rounded transition-colors">Export CSV</button>
            <button class="text-xs bg-brand-purple hover:bg-brand-purple/80 text-white px-3 py-1.5 rounded transition-colors">+ New Report</button>
            <div class="w-7 h-7 rounded-full bg-brand-purple/30 text-brand-purple flex items-center justify-center text-xs font-bold ml-1">JD</div>
        </div>
    </div>

    {{-- Sub bar --}}
    <div class="flex items-center justify-between px-5 py-2 bg-zinc-900/60 border-b border-zinc-800 shrink-0">
        <div class="flex items-center gap-3">
            <span class="text-xs text-zinc-500">Period:</span>
            <select class="text-xs bg-zinc-800 border border-zinc-700 text-zinc-300 rounded px-2 py-1 focus:outline-none">
                <option>Last 12 Months</option>
                <option>Last 6 Months</option>
                <option>YTD</option>
                <option>Custom</option>
            </select>
            <select class="text-xs bg-zinc-800 border border-zinc-700 text-zinc-300 rounded px-2 py-1 focus:outline-none">
                <option>All Departments</option>
                <option>Sales</option>
                <option>Operations</option>
                <option>Marketing</option>
            </select>
            <select class="text-xs bg-zinc-800 border border-zinc-700 text-zinc-300 rounded px-2 py-1 focus:outline-none">
                <option>GBP (£)</option>
                <option>USD ($)</option>
                <option>EUR (€)</option>
            </select>
        </div>
        <div class="flex items-center gap-2">
            <button class="text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-400 px-2.5 py-1 rounded transition-colors">Schedule Report</button>
            <button class="text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-400 px-2.5 py-1 rounded transition-colors">Share</button>
            <button class="text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-400 px-2.5 py-1 rounded transition-colors">Print</button>
            <button class="text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-400 px-2.5 py-1 rounded transition-colors">Refresh</button>
        </div>
    </div>

    {{-- Body --}}
    <div class="flex flex-1 min-h-0 overflow-hidden">

        {{-- Left sidebar --}}
        <div class="w-44 bg-zinc-900 border-r border-zinc-800 flex flex-col shrink-0 py-3">
            <p class="text-zinc-600 text-xs uppercase tracking-widest px-4 mb-2">Quick Nav</p>
            @foreach([
                ['label' => 'Overview', 'active' => true],
                ['label' => 'Revenue', 'active' => false],
                ['label' => 'Expenses', 'active' => false],
                ['label' => 'Profit & Loss', 'active' => false],
                ['label' => 'Cash Flow', 'active' => false],
                ['label' => 'Balance Sheet', 'active' => false],
                ['label' => 'Tax Summary', 'active' => false],
                ['label' => 'Reconciliation', 'active' => false],
            ] as $nav)
                <a href="#" class="px-4 py-1.5 text-xs transition-colors {{ $nav['active'] ? 'text-brand-purple bg-brand-purple/10 font-semibold' : 'text-zinc-400 hover:text-zinc-200' }}">
                    {{ $nav['label'] }}
                </a>
            @endforeach

            <div class="mt-4 mx-3 border-t border-zinc-800 pt-3">
                <p class="text-zinc-600 text-xs uppercase tracking-widest mb-2 px-1">Alerts</p>
                <div class="bg-brand-red/10 border border-brand-red/30 rounded p-2 mb-2">
                    <p class="text-brand-red text-xs font-semibold">3 Overdue</p>
                    <p class="text-zinc-500 text-xs mt-0.5">Invoices pending</p>
                </div>
                <div class="bg-yellow-500/10 border border-yellow-500/30 rounded p-2">
                    <p class="text-yellow-400 text-xs font-semibold">VAT Due</p>
                    <p class="text-zinc-500 text-xs mt-0.5">In 12 days</p>
                </div>
            </div>
        </div>

        {{-- Main content --}}
        <div class="flex-1 overflow-y-auto p-4 flex flex-col gap-4 min-w-0">

            {{-- KPI cards --}}
            <div class="grid grid-cols-5 gap-3 shrink-0">
                @foreach([
                    ['label' => 'Daily Revenue', 'value' => '£4,821', 'change' => '+8.3%', 'up' => true],
                    ['label' => 'Monthly Profit', 'value' => '£31,450', 'change' => '+2.1%', 'up' => true],
                    ['label' => 'Outstanding', 'value' => '£12,390', 'change' => '-£1,200', 'up' => false],
                    ['label' => 'Avg Order Value', 'value' => '£143', 'change' => '+5.7%', 'up' => true],
                    ['label' => 'Expenses MTD', 'value' => '£18,220', 'change' => '+12.4%', 'up' => false],
                ] as $kpi)
                    <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-3">
                        <p class="text-zinc-500 text-xs mb-1">{{ $kpi['label'] }}</p>
                        <p class="text-white font-bold text-lg leading-none">{{ $kpi['value'] }}</p>
                        <p class="text-xs mt-1.5 font-medium {{ $kpi['up'] ? 'text-brand-green' : 'text-brand-red' }}">
                            {{ $kpi['change'] }} vs last period
                        </p>
                    </div>
                @endforeach
            </div>

            {{-- Chart + side panels --}}
            <div class="flex gap-3 shrink-0">

                {{-- Chart --}}
                <div class="flex-1 bg-zinc-900 border border-zinc-800 rounded-lg p-4 min-w-0">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-white text-sm font-semibold">Revenue vs Profit</p>
                            <p class="text-zinc-500 text-xs">Last 12 months · GBP</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="flex items-center gap-1 text-xs text-zinc-400"><span class="w-2.5 h-2.5 rounded-sm inline-block bg-brand-purple"></span>Revenue</span>
                            <span class="flex items-center gap-1 text-xs text-zinc-400"><span class="w-2.5 h-2.5 rounded-sm inline-block bg-brand-green"></span>Profit</span>
                            <button class="text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-400 px-2 py-1 rounded ml-2 transition-colors">Bar</button>
                            <button class="text-xs bg-zinc-700 text-zinc-200 px-2 py-1 rounded transition-colors">Line</button>
                        </div>
                    </div>
                    <div id="revenue-chart" style="height:200px; width:100%;"></div>
                </div>

                {{-- Top Products --}}
                <div class="w-52 bg-zinc-900 border border-zinc-800 rounded-lg p-4 shrink-0">
                    <p class="text-white text-sm font-semibold mb-3">Top Products</p>
                    <ul class="flex flex-col gap-2.5">
                        @foreach([
                            ['name' => 'Enterprise Suite', 'rev' => '£18,400', 'pct' => 82],
                            ['name' => 'Analytics Pro', 'rev' => '£11,200', 'pct' => 64],
                            ['name' => 'Support Plan', 'rev' => '£7,800', 'pct' => 44],
                            ['name' => 'API Access', 'rev' => '£5,100', 'pct' => 29],
                            ['name' => 'Storage Add-on', 'rev' => '£2,300', 'pct' => 13],
                        ] as $p)
                            <li>
                                <div class="flex justify-between text-xs mb-1">
                                    <span class="text-zinc-300 truncate">{{ $p['name'] }}</span>
                                    <span class="text-zinc-500 shrink-0 ml-1">{{ $p['rev'] }}</span>
                                </div>
                                <div class="h-1 bg-zinc-800 rounded-full">
                                    <div class="h-1 bg-brand-purple rounded-full" style="width:{{ $p['pct'] }}%"></div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            {{-- Bottom row --}}
            <div class="grid grid-cols-3 gap-3 shrink-0">

                {{-- Recent Transactions --}}
                <div class="col-span-2 bg-zinc-900 border border-zinc-800 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-3">
                        <p class="text-white text-sm font-semibold">Recent Transactions</p>
                        <button class="text-xs text-brand-purple hover:text-brand-purple/70 transition-colors">View All</button>
                    </div>
                    <table class="w-full text-xs">
                        <thead>
                            <tr class="text-zinc-500 border-b border-zinc-800">
                                <th class="text-left pb-2 font-medium">Description</th>
                                <th class="text-left pb-2 font-medium">Category</th>
                                <th class="text-left pb-2 font-medium">Date</th>
                                <th class="text-right pb-2 font-medium">Amount</th>
                                <th class="text-right pb-2 font-medium">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-zinc-800">
                            @foreach([
                                ['desc' => 'Invoice #4821 — Acme Ltd', 'cat' => 'Sales', 'date' => '09 May 2025', 'amount' => '+£3,200', 'status' => 'Paid', 'pos' => true],
                                ['desc' => 'AWS Infrastructure', 'cat' => 'Operations', 'date' => '08 May 2025', 'amount' => '-£892', 'status' => 'Posted', 'pos' => false],
                                ['desc' => 'Invoice #4820 — Globex', 'cat' => 'Sales', 'date' => '07 May 2025', 'amount' => '+£1,450', 'status' => 'Paid', 'pos' => true],
                                ['desc' => 'Contractor — Dev Team', 'cat' => 'Payroll', 'date' => '06 May 2025', 'amount' => '-£4,000', 'status' => 'Posted', 'pos' => false],
                                ['desc' => 'Invoice #4819 — NovaCorp', 'cat' => 'Sales', 'date' => '05 May 2025', 'amount' => '+£2,100', 'status' => 'Pending', 'pos' => true],
                            ] as $tx)
                                <tr class="text-zinc-400">
                                    <td class="py-2 text-zinc-200">{{ $tx['desc'] }}</td>
                                    <td class="py-2">{{ $tx['cat'] }}</td>
                                    <td class="py-2">{{ $tx['date'] }}</td>
                                    <td class="py-2 text-right font-medium {{ $tx['pos'] ? 'text-brand-green' : 'text-brand-red' }}">{{ $tx['amount'] }}</td>
                                    <td class="py-2 text-right">
                                        <span class="px-1.5 py-0.5 rounded text-xs font-medium
                                            {{ $tx['status'] === 'Paid' ? 'bg-brand-green/10 text-brand-green' : '' }}
                                            {{ $tx['status'] === 'Pending' ? 'bg-yellow-500/10 text-yellow-400' : '' }}
                                            {{ $tx['status'] === 'Posted' ? 'bg-zinc-800 text-zinc-400' : '' }}">
                                            {{ $tx['status'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Activity + Quick Actions --}}
                <div class="flex flex-col gap-3">
                    <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-4 flex-1">
                        <p class="text-white text-sm font-semibold mb-3">Quick Actions</p>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach(['Raise Invoice', 'Log Expense', 'Run Payroll', 'Bank Sync', 'File VAT', 'Add Vendor', 'Budget Review', 'Audit Trail'] as $action)
                                <button class="text-xs bg-zinc-800 hover:bg-zinc-700 text-zinc-300 px-2 py-2 rounded transition-colors text-left">
                                    {{ $action }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-zinc-900 border border-zinc-800 rounded-lg p-4 shrink-0">
                        <p class="text-white text-sm font-semibold mb-2">Budget vs Actual</p>
                        @foreach(['Marketing' => [65, 80], 'Operations' => [91, 100], 'R&D' => [42, 60]] as $dept => $vals)
                            <div class="mb-2">
                                <div class="flex justify-between text-xs text-zinc-500 mb-1">
                                    <span>{{ $dept }}</span>
                                    <span>{{ $vals[0] }}% of {{ $vals[1] }}k</span>
                                </div>
                                <div class="h-1.5 bg-zinc-800 rounded-full">
                                    <div class="h-1.5 rounded-full {{ $vals[0] >= 90 ? 'bg-brand-red' : 'bg-brand-green' }}" style="width:{{ $vals[0] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>

</section>
@vite('resources/js/enterprise.js')
