import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import {createInertiaApp, Link} from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import {definePreset} from '@primeuix/styled'
import Aura from '@primevue/themes/aura'
import ToastService from 'primevue/toastservice';
import PrimeVue from 'primevue/config'



const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const Noir = definePreset(Aura, {
    semantic: {
        primary: {
            50: '{noir.50}',
            100: '{noir.100}',
            200: '{noir.200}',
            300: '{noir.300}',
            400: '{noir.400}',
            500: '{noir.500}',
            600: '{noir.600}',
            700: '{noir.700}',
            800: '{noir.800}',
            900: '{noir.900}',
            950: '{noir.950}'
        },
        colorScheme: {
            light: {
                primary: {
                    color: '{noir.300}',
                    inverseColor: '#ffffff',
                    hoverColor: '{noir.300}',
                    activeColor: '{noir.300}'
                },
                highlight: {
                    background: '{noir.300}',
                    focusBackground: '{noir.300}',
                    color: '#ffffff',
                    focusColor: '#ffffff'
                }
            },
            dark: {
                primary: {
                    color: '{noir.50}',
                    inverseColor: '{noir.300}',
                    hoverColor: '{noir.100}',
                    activeColor: '{noir.200}'
                },
                highlight: {
                    background: 'rgba(250, 250, 250, .16)',
                    focusBackground: 'rgba(250, 250, 250, .24)',
                    color: 'rgba(255,255,255,.87)',
                    focusColor: 'rgba(255,255,255,.87)'
                }
            }
        }
    }
});

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link', Link) // Daftarkan komponen Link
            .use(ZiggyVue)
            .use(PrimeVue, {
                theme: {
                    preset: Noir,
                    color: Noir,
                    options: {
                        darkModeSelector: false,
                    }
                }
            })
            .use(ToastService)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
