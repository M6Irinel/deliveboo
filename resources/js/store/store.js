// @ts-nocheck
import Vue from "vue";

export default Vue.observable({
    restaurants: null,
    typologies: null,
    loadingRestaurant: false,
    loadingCart: false,
    loadingPlates: false,
    plates: null,
    totalCart: null,
    prezzoTotaleDaPagare: null,
    coloreTema: 1,
    lastPage: null,
    currentPage: null,
});
