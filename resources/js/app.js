require('./bootstrap');


// window.Vue = require('vue');
// window.Vue = require('vue').default;
//
//
// Vue.component('messages', require('./components/Messenger.vue').default);
//
// const app = new Vue({
//     el: '#app',
// });

// import { createApp } from 'vue'
// import Messages from './components/Messenger.vue';
//
// const app = createApp({});
// app.component('messages', Messages)
//     .mount('#app');

import Alpine from 'alpinejs';
import moment from 'moment';

window.Alpine = Alpine;

Alpine.start();
