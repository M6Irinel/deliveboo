<template>
    <div>
        <div v-html="forLogin" />
        <div class="container">
            <h1>Ristoranti belli</h1>

            <ul>
                <router-link v-for="(restaurant, i) in restaurants" :key="i" :to="{ name: 'Plates' }">
                    <li @click="setRestaurantId(i)">
                        <strong> Nome Ristorante:- {{ restaurant.user.name }} </strong>
                    </li>
                </router-link>
            </ul>
        </div>
    </div>
</template>


<script>
// @ts-nocheck
import store from '../../store/store';

export default {
    name: 'RestaurantsIndex',

    data () {
        return {
            forLogin
        }
    },

    computed: {
        restaurants () { return store.restaurants }
    },

    methods: {
        setRestaurantId ( id ) {
            store.restaurant_Id = id;
        }
    }
}
</script>


<style lang="scss">

</style>
