import * as echarts from 'echarts';

class RevenueChartData {
    constructor({ months, revenueRange, profitMarginRange }) {
        this.months = months;
        this.revenueRange = revenueRange;
        this.profitMarginRange = profitMarginRange;
    }

    randomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    generate() {
        return this.months.map(month => {
            const revenue = this.randomInt(...this.revenueRange);
            const margin = (this.randomInt(...this.profitMarginRange)) / 100;
            return { month, revenue, profit: Math.round(revenue * margin) };
        });
    }
}

class RevenueChart {
    constructor(options = {}) {
        this.colors = options.colors ?? {
            revenue: '#C49EE8',
            profit: '#56EF65',
            grid: '#27272a',
            label: '#71717a',
            tooltip: '#18181b',
        };

        this.months = options.months ?? [
            'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
            'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May',
        ];

        this.revenueRange = options.revenueRange ?? [40000, 95000];
        this.profitMarginRange = options.profitMarginRange ?? [20, 42];
    }

    mount(el) {
        const factory = new RevenueChartData({
            months: this.months,
            revenueRange: this.revenueRange,
            profitMarginRange: this.profitMarginRange,
        });

        const data = factory.generate();
        const chart = echarts.init(el, 'dark');

        chart.setOption({
            backgroundColor: 'transparent',
            tooltip: {
                trigger: 'axis',
                backgroundColor: this.colors.tooltip,
                borderColor: '#3f3f46',
                textStyle: { color: '#e4e4e7', fontSize: 11 },
                formatter: (params) => {
                    const [rev, prof] = params;
                    return `<strong>${rev.name}</strong><br/>
                        Revenue: £${rev.value.toLocaleString()}<br/>
                        Profit: £${prof.value.toLocaleString()}`;
                },
            },
            grid: { top: 10, right: 16, bottom: 24, left: 52 },
            xAxis: {
                type: 'category',
                data: data.map(d => d.month),
                axisLine: { lineStyle: { color: this.colors.grid } },
                axisTick: { show: false },
                axisLabel: { color: this.colors.label, fontSize: 10 },
            },
            yAxis: {
                type: 'value',
                splitLine: { lineStyle: { color: this.colors.grid } },
                axisLabel: {
                    color: this.colors.label,
                    fontSize: 10,
                    formatter: v => `£${(v / 1000).toFixed(0)}k`,
                },
            },
            series: [
                {
                    name: 'Revenue',
                    type: 'line',
                    data: data.map(d => d.revenue),
                    smooth: true,
                    lineStyle: { color: this.colors.revenue, width: 2 },
                    itemStyle: { color: this.colors.revenue },
                    areaStyle: { color: { type: 'linear', x: 0, y: 0, x2: 0, y2: 1, colorStops: [
                        { offset: 0, color: this.colors.revenue + '40' },
                        { offset: 1, color: this.colors.revenue + '00' },
                    ]}},
                    symbol: 'none',
                },
                {
                    name: 'Profit',
                    type: 'line',
                    data: data.map(d => d.profit),
                    smooth: true,
                    lineStyle: { color: this.colors.profit, width: 2 },
                    itemStyle: { color: this.colors.profit },
                    areaStyle: { color: { type: 'linear', x: 0, y: 0, x2: 0, y2: 1, colorStops: [
                        { offset: 0, color: this.colors.profit + '40' },
                        { offset: 1, color: this.colors.profit + '00' },
                    ]}},
                    symbol: 'none',
                },
            ],
        });

        window.addEventListener('resize', () => chart.resize());
    }
}

const chartEl = document.getElementById('revenue-chart');
if (chartEl) new RevenueChart().mount(chartEl);
