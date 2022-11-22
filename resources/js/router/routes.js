// @ts-nocheck

import RestaurantsIndex from "../pages/restaurants/index.vue";
import PlatesIndex from "../pages/plates/index.vue";
import NotFound from '../pages/not-found.vue';

export default [
    {
        path: "/",
        name: "Home",
        component: RestaurantsIndex,
    },
    {
        path: "/plates",
        name: "Plates",
        component: PlatesIndex,
    },
    {
        path: '*',
        name: 'not-found',
        component: NotFound
    }
];
