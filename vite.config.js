import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['storage/css/app.css', 'storage/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
