import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'Modules/Blog/Resources/assets/sass/app.scss',
                'Modules/Blog/Resources/assets/js/app.js',
            ],
            refresh: true,
        }),
    ],
    /*resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },*/
});
