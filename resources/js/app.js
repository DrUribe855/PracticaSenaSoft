require('./bootstrap');

import Vue from 'vue';

window.Vue = require('vue');

//Lista de componentes
Vue.component('login', require('./components/Login.vue').default)
Vue.component('store', require('./components/dispatcher/Store.vue').default);

const app = new Vue({
    el: '#app',
});
