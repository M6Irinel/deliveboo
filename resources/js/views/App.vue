<template>
    <div>
        <router-view />
    </div>
</template>


<script>
// @ts-nocheck
// import store from '../store/store';

export default {
    name: 'AppVue',

    data() {
        return {
            // restaurants
        }
    },

    methods: {
        fetchRestaurants () {
            axios.get( '/api/restaurants' ).then( r => {
                console.log(r);
            })
        }
    },

    created () {
        this.fetchRestaurants();
    }
}
</script>


<style lang="scss">

</style>
