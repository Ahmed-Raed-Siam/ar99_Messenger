require('./bootstrap');

// window.Vue = require('vue');
// window.Vue = require('vue').default;
//
//
// Vue.component('messages', require('./components/Messages.vue').default);
//
// const app = new Vue({
//     el: '#app',
// });

import { createApp } from 'vue'
import Messages from './components/Messages.vue';

const app = createApp({});
app.component('messages', Messages)
    .mount('#app');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
