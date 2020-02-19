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

Vue.component('individual-component', require('./components/IndividualComponent.vue'));
Vue.component('sacco-component', require('./components/SaccoComponent.vue'));
Vue.component('transaction-component', require('./components/TransactionComponent.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('simple-upload', require('./components/SimpleUpload.vue'));

console.log('LOADING VUE');

const app = new Vue({
    el: '#app'
});