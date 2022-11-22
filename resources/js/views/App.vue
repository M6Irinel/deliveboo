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

    data() {
        return {
            restaurants: [],
        }
    },

    methods: {
        fetchRestaurants() {
            axios.get('/api/restaurants').then(r => {
                store.restaurants = r.data.restaurants;
                console.log(store.restaurants)
                console.log(store.restaurant_Id)
              
            })
        }
    },

    created() {
        this.fetchRestaurants();
    }
}
</script>


<style lang="scss">

</style>
