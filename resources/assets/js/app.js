/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import YardSale from './components/YardSale.vue'
import SaleManage from './components/SaleManage.vue'
import DashBoardClient from './components/DashBoardClient.vue';
Vue.component('YardSale', YardSale);
Vue.component('SaleManage', SaleManage);
Vue.component('DashBoardClient', DashBoardClient);

const app = new Vue({
    el: '#app'
});
