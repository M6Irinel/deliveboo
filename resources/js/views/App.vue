<template>
    <div class="min-h-100vh flex f-column">
        <NavBar />
        <router-view />
    </div>
</template>


<script>
// @ts-nocheck
import store from '../store/store';
import NavBar from '../components/NavBar.vue';

export default {
    name: 'AppVue',

    components: {
        NavBar,
    },

    methods: {
        fetchRestaurants () {
            axios.get( '/api/restaurants' ).then( r => {
                store.restaurants = r.data.restaurants;
                store.hasPlates = true;
            } );
        },

        fetchTypologies () {
            axios.get( '/api/typologies' ).then( r => {
                store.typologies = r.data.typologies;
                store.loadingRestaurant = false;
            } );
        }
    },

    created () {
        store.loadingRestaurant = true;
        this.fetchRestaurants();
        this.fetchTypologies();
    }
}
</script>


<style lang="scss">
.grow-1 {
    flex-grow: 1;
}
.grow-2 {
    flex-grow: 2;
}
</style>
