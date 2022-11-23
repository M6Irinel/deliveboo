<template>
    <div>
        <router-view />
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
            store.caricamento = true;
            axios.get( '/api/restaurants' ).then( r => {
                store.restaurants = r.data.restaurants;
                store.vai = true;
                store.caricamento = false;
            
            } )
        },

        fetchTypologies () {
            store.caricamento = true;
            axios.get( '/api/typologies' ).then( r => {
                store.typologies = r.data.typologies;
                       
            } )
        }
    },

    created () {
        this.fetchRestaurants();
        this.fetchTypologies();
    }
}
</script>


<style lang="scss">

</style>
