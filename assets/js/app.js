/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

const $ = require('jquery');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import App from './App'

Vue.use(BootstrapVue);

/**
 * Create a fresh Vue Application instance
 */
new Vue({
    el: '#app',
    template: '<App/>',
    components: { App }
});