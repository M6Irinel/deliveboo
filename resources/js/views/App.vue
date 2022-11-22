<template>
    <div>
        <router-view />
        <!-- {{restaurants}} -->
        <!-- <pre>{{restaurants}}</pre> -->

    </div>
</template>


<script>
// @ts-nocheck
import store from '../store/store';

export default {
    name: 'AppVue',

    data () {
        return {
            restaurants: [],
        }
    },

    methods: {
        fetchRestaurants () {
            axios.get( '/api/restaurants' ).then( r => {
                store.restaurants = r.data.restaurants;
                store.vai = true;
            } )
        }
    },

    created () {
        this.fetchRestaurants();
    }
}
</script>


<style lang="scss">

</style>
