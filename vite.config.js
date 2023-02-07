import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

export default ({ mode }) => {
    console.log(loadEnv(mode, ".").VITE_SERVER_HOST)
    return defineConfig({
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
        ],
        server: {
            hmr: {
                host: loadEnv(mode, '.').VITE_SERVER_HOST
            }
        }
    });
}

