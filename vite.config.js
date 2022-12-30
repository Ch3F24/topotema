import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import { viteStaticCopy } from 'vite-plugin-static-copy'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/stamen.js',
                'resources/js/object.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
                {
                    src: 'node_modules/leaflet/dist/leaflet.js',
                    dest: 'assets/'
                },
                {
                    src: 'node_modules/leaflet/dist/leaflet.js.map',
                    dest: 'assets/'
                },
                // {
                //     src: 'node_modules/leaflet-control-geocoder/dist/Control.Geocoder.min.js',
                //     dest: 'assets/'
                // },
                // {
                //     src: 'node_modules/leaflet-control-geocoder/dist/Control.Geocoder.min.js.map',
                //     dest: 'assets/'
                // }
            ]
        })
    ],
});
