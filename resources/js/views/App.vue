<template>
    <div class="max">
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
                store.loading = false;
            } );
        }
    },

    created () {
        store.loading = true;
        this.fetchRestaurants();
        this.fetchTypologies();
    }
}
</script>


<style lang="scss">
    .max{
        height: 100vh;
        background-color: magenta;
    }
</style>
