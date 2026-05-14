import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/ecommerce.js', 'resources/js/enterprise.js', 'resources/js/i-can-do-anything.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
