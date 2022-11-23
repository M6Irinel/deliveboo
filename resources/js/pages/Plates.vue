<template>
    <div>
        <div v-html="forLogin" />
        <div class="container">
            <router-link :to="{                         name: 'Home'                         }">Ristoranti</router-link>

            <h1>Piatti</h1>

            <div v-if="!loading">
                <div v-if="hasPlates">
                    <p v-for="(plate, i) in restaurants[restaurant_Id].plates" :key="i">
                        {{ plate.plate_name }}
                    </p>
                </div>
            </div>
            <div v-else>
                <LoaderC />
            </div>
        </div>
    </div>
</template>


<script>
// @ts-nocheck
import LoaderC from '../components/Loader.vue';
import store from '../store/store';

export default {
    name: "PlatesIndex",

    components: { LoaderC },

    data () {
        return {
            forLogin
        };
    },

    computed: {
        restaurants () { return store.restaurants; },
        hasPlates () { return store.hasPlates; },
        loading () { return store.loading; },
        restaurant_Id () { return this.$route.params.id; }
    },
}
</script>


<style lang="scss">

</style>
