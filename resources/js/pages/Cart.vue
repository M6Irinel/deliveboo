<template>
    <div>
        <header v-html="forLogin" />
        <main v-if="!loading" class="container">
            <div>
                <router-link :to="{ name: 'Home' }">Ristoranti</router-link>
            </div>

            <h1>Cart</h1>

            <ul class="list-style-none grid-12 gap-5" v-if="plates">
                <li class="g-col-3 card p-2" v-for="(v, i) in plates" :key="i">
                    <div v-if="v.plate_image">
                        <img height="200" :src="'./storage/' + v.plate_image" alt="" />
                    </div>
                    <p>{{ v.plate_name }}</p>
                    <p>Price: {{ v.plate_price }}€</p>
                    <p>Quantità: {{ quantity(v.plate_name) }}</p>
                </li>
                <button @click="pulisciStorage()">Svuota il Carello</button>
            </ul>

            <div v-else>
                <p>carrello vuoto</p>
            </div>
        </main>
        <div v-else>
            <LoaderC />
        </div>
    </div>
</template>


<script>
// @ts-nocheck
import store from "../store/store";
import LoaderC from "../components/Loader.vue";

export default {
    name: "CartVue",

    components: { LoaderC },

    data () {
        return {
            forLogin,
        };
    },

    computed: {
        plates () {
            if ( store.plates )
                return store.plates.filter( ( e ) => sessionStorage[ e.plate_name ] );
            else return null;
        },
        loading () {
            return store.loading;
        },
    },

    methods: {
        fetchPlates () {
            store.loading = true;
            axios
                .get( `/api/restaurants/${ sessionStorage.getItem( "resId" ) }` )
                .then( ( r ) => {
                    store.plates = r.data.plates;
                    store.loading = false;
                } );
        },
        pulisciStorage () {
            sessionStorage.clear();
        },
        quantity ( v ) {
            return sessionStorage.getItem( v + '-counter' );
        }
    },

    created () {
        this.fetchPlates();
    },

};
</script>


<style lang="scss">

</style>
