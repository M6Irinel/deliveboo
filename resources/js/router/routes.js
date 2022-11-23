// @ts-nocheck
import Restaurants from "../pages/Restaurants.vue";
import Plates from "../pages/Plates.vue";
import NotFound from '../pages/NotFound.vue';

export default [

    {
        path: "/",
        name: "Home",
        component: Restaurants,
    },
    {
        path: "/restaurant/:id",
        name: "Plates",
        component: Plates,
    },
    {
        path: '*',
        name: 'not-found',
        component: NotFound
    }
];
