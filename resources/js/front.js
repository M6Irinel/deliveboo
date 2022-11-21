// @ts-nocheck

import Vue from 'vue'
import VueRouter from 'vue-router'

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.use(VueRouter)

const app = new Vue({
    el: '#app',
});

