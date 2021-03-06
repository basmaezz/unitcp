
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// import vueDropzone from "vue2-dropzone";
// import "vue2-dropzone/dist/vue2Dropzone.css"
// import axios from 'axios'
// window.mime = require('mime-to-extensions');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
//
// Vue.component('dropzone', require('./components/Dropzone.vue'));
// Vue.component('vueDropzone',vueDropzone);
Vue.component('notification', require('./components/Notification.vue'));
const app = new Vue({
    el: '#app'
});
