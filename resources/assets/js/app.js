/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-moment'));

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import L from 'leaflet';
delete L.Icon.Default.prototype._getIconUrl;

L.Icon.Default.mergeOptions({
  iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
  iconUrl: require('leaflet/dist/images/marker-icon.png'),
  shadowUrl: require('leaflet/dist/images/marker-shadow.png')
});

window.EventBus = new Vue();
import { store } from './store';

import YardSale from './components/YardSale.vue'
import SaleManage from './components/SaleManage.vue'
import ShowGarage from './components/Show.vue'
import DashBoardClient from './components/DashBoardClient.vue';
import Address from './components/Address.vue';
Vue.component('YardSale', YardSale);
Vue.component('SaleManage', SaleManage);
Vue.component('ShowGarage', ShowGarage);
Vue.component('DashBoardClient', DashBoardClient);
Vue.component('AppAddress', Address);

const app = new Vue({
    el: '#app',
    store,
});
