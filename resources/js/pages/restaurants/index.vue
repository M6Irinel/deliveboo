<template>
    <div>
        <div v-html="forLogin" />
        <div class="container">
            <h1>Ristoranti belli</h1>
            <router-link :to="{ name: 'Plates' }">piatti</router-link>

            <ul>
                <router-link
               v-for="(restaurant, i) in restaurants" :key="i"
                :to="{name: 'Plates'}"
                  @click="store.restaurants_id= i">
                    <li>
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

    data() {
        return {
            forLogin
        }
    },
    computed: {
        restaurants() {
            return store.restaurants
        }

    },
}
</script>


<style lang="scss">

</style>
