// @ts-nocheck

window.axios = require("axios");
window.axios.defaults.headers.common[ "X-Requested-With" ] = "XMLHttpRequest";

import Vue from "vue";
import router from "./router/router";
import AppVue from "./views/App.vue";
import { library } from '@fortawesome/fontawesome-svg-core';
// import { faHatWizard } from '@fortawesome/free-solid-svg-icons'; 
import { faBasketShopping} from '@fortawesome/free-solid-svg-icons';
import { faHourglassHalf } from '@fortawesome/free-regular-svg-icons';
// import { faHatWizard } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
library.add(
    faHourglassHalf,
    faBasketShopping,
);
Vue.component( 'font-awesome-icon', FontAwesomeIcon );

new Vue({
    el: "#app",
    render(h) {
        return h(AppVue);
    },
    router,
});
