import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Layout', Layout)
            .component('Link', Link)
            .mount(el)
    },
    progress: {
        delay: 150,
        color: '#FEC100',
        includeCSS: true,
        showSpinner: true,

    },
})
