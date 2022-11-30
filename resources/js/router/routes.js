// @ts-nocheck
import Restaurants from "../pages/Restaurants.vue";
import Plates from "../pages/Plates.vue";
import NotFound from "../pages/NotFound.vue";
import Cart from "../pages/Cart.vue";
import ThankYou from "../pages/ThankYou.vue";
import Settings from "../pages/Settings.vue";

export default [
    {
        path: "/",
        name: "Home",
        component: Restaurants,
    },
    {
        path: "/restaurant/:slug",
        name: "Plates",
        component: Plates,
    },
    {
        path: "/cart",
        name: "Cart",
        component: Cart,
    },
    {
        path: "/thankyou",
        name: "ThankYou",
        component: ThankYou,
    },
    {
        path: "/settings",
        name: "Settings",
        component: Settings,
    },
    {
        path: "*",
        name: "not-found",
        component: NotFound,
    },
];
