<template>
    <div>
        <div v-html="forLogin" />
        <div class="container">
            <h1>Ristoranti belli</h1>

            <ul v-if="!caricamento">
                <router-link v-for="(restaurant, i) in restaurants" :key="i"
                    :to="{ name: 'Plates', params: { 'id': i } }">
                    <li>
                        <strong> Nome Ristorante:- {{ restaurant.user.name }} </strong>
                    </li>
                </router-link>
            </ul>
            <div v-else>
                <LoadComp />
            </div>
        </div>
    </div>
</template>


<script>
// @ts-nocheck
import LoadComp from '../../components/LoadComp.vue';
import store from '../../store/store';

export default {
    name: "RestaurantsIndex",
    data() {
        return {
            forLogin
        };
    },
    computed: {
        restaurants() { return store.restaurants; },
        caricamento() { return store.caricamento; },
    },
    components: { LoadComp }
}
</script>


<style lang="scss">

</style>
