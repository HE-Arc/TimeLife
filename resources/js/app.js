require('./bootstrap');

// Import modules...
import Vue from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue';
import Buefy from 'buefy'
//import 'buefy/dist/buefy.css'
//import { InertiaProgress } from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'TimeLife';

Vue.mixin({ methods: { route } });
Vue.use(Buefy, {
    defaultIconPack: 'fa',
});
Vue.filter('truncate', function (text, length, suffix) {
    if (text.length > length) {
        return text.substring(0, length) + suffix;
    } else {
        return text;
    }
});

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props }) {
        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
});
//InertiaProgress.init({ color: '#4B5563' });
