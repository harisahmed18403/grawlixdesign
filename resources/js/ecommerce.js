import { createGrid, ModuleRegistry, AllCommunityModule, themeBalham } from 'ag-grid-community';

ModuleRegistry.registerModules([AllCommunityModule]);

class OrderDataFactory {
    constructor({ itemNames, platforms, rowCount, dateRangeMonths }) {
        this.itemNames = itemNames;
        this.platforms = platforms;
        this.rowCount = rowCount;
        this.dateRangeMonths = dateRangeMonths;
    }

    randomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    randomSku() {
        return 'SKU-' + Math.random().toString(36).substring(2, 8).toUpperCase();
    }

    randomDate() {
        const now = new Date();
        const from = new Date();
        from.setMonth(from.getMonth() - this.dateRangeMonths);
        return new Date(from.getTime() + Math.random() * (now - from))
            .toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
    }

    createItems() {
        return Array.from({ length: this.randomInt(1, 3) }, () => ({
            name: this.itemNames[this.randomInt(0, this.itemNames.length - 1)],
            sku: this.randomSku(),
            quantity: this.randomInt(1, 10),
            price: parseFloat((Math.random() * 99 + 1).toFixed(2)),
        }));
    }

    randomPlatform() {
        return this.platforms[this.randomInt(0, this.platforms.length - 1)];
    }

    createRowData() {
        return Array.from({ length: this.rowCount }, (_, i) => {
            const items = this.createItems();
            const total = items.reduce((sum, item) => sum + item.price * item.quantity, 0);
            return {
                platform: this.randomPlatform(),
                orderID: this.randomInt(100000, 999999),
                buyer: `John Doe`,
                date: this.randomDate(),
                total: `£${total.toFixed(2)}`,
                items,
            };
        });
    }
}

function createActionDropdownRenderer(actions, colors) {
    return class {
        init() {
            this.container = document.createElement('div');
            this.container.style.cssText = 'display:flex; align-items:center; height:100%;';

            const button = document.createElement('button');
            button.textContent = 'Action ▾';
            button.style.cssText = `
                width:100px; height:28px; line-height:28px; padding:0; text-align:center;
                font-size:13px; font-weight:500; cursor:pointer; border:none; border-radius:4px;
                background:${colors.purple}; color:white;
            `;

            this.dropdown = document.createElement('div');
            this.dropdown.style.cssText = `
                position:fixed; display:none; z-index:9999; background:white;
                border:1px solid #e4e4e7; border-radius:6px;
                box-shadow:0 4px 12px rgba(0,0,0,0.12); min-width:160px; overflow:hidden;
            `;

            actions.forEach(({ label, color }) => {
                const item = document.createElement('button');
                item.textContent = label;
                item.style.cssText = `
                    display:block; width:100%; text-align:left; padding:8px 14px;
                    font-size:13px; border:none; background:white; cursor:pointer; color:#18181b;
                `;
                item.addEventListener('mouseenter', () => { item.style.background = color; item.style.color = 'white'; });
                item.addEventListener('mouseleave', () => { item.style.background = 'white'; item.style.color = '#18181b'; });
                this.dropdown.appendChild(item);
            });

            document.body.appendChild(this.dropdown);

            let hideTimer = null;
            const show = () => {
                clearTimeout(hideTimer);
                this.dropdown.style.visibility = 'hidden';
                this.dropdown.style.display = 'block';
                const rect = button.getBoundingClientRect();
                this.dropdown.style.top = rect.bottom + 'px';
                this.dropdown.style.left = rect.right - this.dropdown.offsetWidth + 'px';
                this.dropdown.style.visibility = 'visible';
            };
            const scheduleHide = () => { hideTimer = setTimeout(() => { this.dropdown.style.display = 'none'; }, 150); };
            const cancelHide = () => clearTimeout(hideTimer);

            button.addEventListener('mouseenter', show);
            button.addEventListener('mouseleave', scheduleHide);
            this.dropdown.addEventListener('mouseenter', cancelHide);
            this.dropdown.addEventListener('mouseleave', scheduleHide);

            this.container.appendChild(button);
        }

        getGui() { return this.container; }
        destroy() { this.dropdown?.remove(); }
    };
}

function itemsCellRenderer(params) {
    const items = params.value;
    if (!items?.length) return '<span>—</span>';

    return items.map(item =>
        `<div style="padding:4px 0; border-bottom:1px solid #eee; line-height:1.5;">
            <strong>${item.name}</strong>&nbsp;
            <span style="color:#888; font-size:0.85em;">${item.sku}</span><br>
            Qty: ${item.quantity}&nbsp;·&nbsp;£${item.price.toFixed(2)}
        </div>`
    ).join('');
}

class EcommerceGrid {
    constructor(options = {}) {
        this.colors = options.colors ?? {
            green: '#56EF65',
            red: '#EF4553',
            purple: '#C49EE8',
        };

        this.actions = options.actions ?? [
            { label: 'Upload Tracking', color: this.colors.green },
            { label: 'Edit', color: this.colors.purple },
            { label: 'Cancel', color: this.colors.red },
            { label: 'Refund', color: this.colors.red },
        ];

        this.itemNames = options.itemNames ?? [
            'Wireless Earbuds Pro', 'USB-C Charging Cable', 'Laptop Stand', 'Mechanical Keyboard',
            'Webcam HD 1080p', 'Portable SSD 1TB', 'Desk LED Lamp', 'Mouse Pad XL',
            'Bluetooth Speaker', 'Screen Cleaning Kit', 'Cable Management Box', 'Monitor Arm',
            'Ergonomic Mouse', 'Phone Mount', 'Smart Plug 4-Pack', 'Surge Protector',
        ];
        this.platforms = options.platforms ?? ['Amazon', 'eBay', 'Website'];
        this.rowCount = options.rowCount ?? 1000;
        this.dateRangeMonths = options.dateRangeMonths ?? 6;
    }

    mount(el) {
        const factory = new OrderDataFactory({
            itemNames: this.itemNames,
            platforms: this.platforms,
            rowCount: this.rowCount,
            dateRangeMonths: this.dateRangeMonths,
        });

        let platformFilter = '';
        let itemsFilter = '';

        const api = createGrid(el, {
            theme: themeBalham,
            rowData: factory.createRowData(),
            columnDefs: [
                { field: 'platform', headerName: 'Platform' },
                { field: 'orderID', headerName: 'Order ID' },
                { field: 'buyer', headerName: 'Buyer' },
                { field: 'date', headerName: 'Date' },
                { field: 'total', headerName: 'Total' },
                { field: 'items', headerName: 'Items', cellRenderer: itemsCellRenderer, valueFormatter: () => '', autoHeight: true, flex: 2 },
                { headerName: 'Action', cellRenderer: createActionDropdownRenderer(this.actions, this.colors), sortable: false, filter: false, flex: 0, width: 120 },
            ],
            defaultColDef: { flex: 1, sortable: true, filter: true },
            isExternalFilterPresent: () => platformFilter !== '' || itemsFilter !== '',
            doesExternalFilterPass: (node) => {
                const row = node.data;
                const platformMatch = platformFilter === '' || row.platform === platformFilter;
                const itemsMatch = itemsFilter === '' || row.items.some(item =>
                    item.name.toLowerCase().includes(itemsFilter.toLowerCase())
                );
                return platformMatch && itemsMatch;
            },
        });

        document.getElementById('filter-platform')?.addEventListener('change', (e) => {
            platformFilter = e.target.value;
            api.onFilterChanged();
        });

        document.getElementById('filter-items')?.addEventListener('input', (e) => {
            itemsFilter = e.target.value;
            api.onFilterChanged();
        });
    }
}

const gridEl = document.getElementById('ag-grid-table');
if (gridEl) new EcommerceGrid().mount(gridEl);
