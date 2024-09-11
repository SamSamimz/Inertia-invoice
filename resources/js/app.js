import './bootstrap';
import Alpine from 'alpinejs';
import '../css/app.css';
import { createApp, h } from 'vue'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
import { createInertiaApp, Link } from '@inertiajs/vue3'
import DefaultLayout from './Layouts/DefaultLayout.vue';

window.Alpine = Alpine;
Alpine.start();

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    const page = pages[`./Pages/${name}.vue`];
    page.default.layout = page.default.layout || DefaultLayout;
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .component('Link',Link)
      .mount(el)
  },
  progress: {
    color: 'darkBlue',
    includeCSS: true,
    showSpinner: false,
  },
})