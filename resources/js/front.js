// @ts-nocheck

window.axios = require("axios");
import Vue from "vue";

import router from "./router/router";

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import AppVue from "./views/App.vue";

new Vue({
    el: "#app",
    render(h) {
        return h(AppVue);
    },
    router,
});
