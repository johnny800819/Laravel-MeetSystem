import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0', // Allow external access (from host machine)
        hmr: {
            host: 'localhost', // Browser should connect to localhost
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
