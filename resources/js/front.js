// @ts-nocheck

window.axios = require("axios");
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

import Vue from "vue";
import vueBraintree from "vue-braintree";
import router from "./router/router";
import AppVue from "./views/App.vue";
import { library } from "@fortawesome/fontawesome-svg-core";

// import { faHatWizard } from '@fortawesome/free-solid-svg-icons';
import {
    faBasketShopping,
    faBars,
    faGear,
    faXmark,
    faLeftLong,
    faDownLong,
    faUpLong, } from "@fortawesome/free-solid-svg-icons";

import { faHourglassHalf } from "@fortawesome/free-regular-svg-icons";
import { faFacebook, faInstagram, faLinkedin, faTelegram, faTwitter } from '@fortawesome/free-brands-svg-icons'

import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(
    faHourglassHalf,
    faBasketShopping,
    faBars,
    faGear,
    faXmark,
    faLeftLong,
    faDownLong,
    faUpLong,
    faFacebook,
    faInstagram,
    faTelegram,
    faLinkedin,
    faTwitter

    
);

Vue.component("font-awesome-icon", FontAwesomeIcon);
Vue.use(vueBraintree);

new Vue({
    el: "#app",
    render(h) {
        return h(AppVue);
    },
    router,
});
